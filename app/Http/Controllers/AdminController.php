<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\UploadedFile;
use App\Models\Cart;
use Illuminate\Support\Carbon;
use Hash;
use Mail;
use App\Models\Revenue;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdmin()
    {   
        $user = Auth::user();
        $currentDate = Carbon::now();
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;

        //tự tạo trong csdl 1 tháng nếu qua tháng
        if (Revenue::whereMonth('dayrevenue', $currentMonth)->exists()) {
            // Tháng hiện tại tồn tại trong cơ sở dữ liệu
            // $newmonth = Revenue::where('month', $currentMonth)->get();
            // Tiếp tục xử lý với $newmonth
        } else {
            $createrevenue = Revenue::create([
                'dayrevenue' => $currentDate,
                'revenue' => 0,
                'ordernumber' => 0,
                'orderproduct' => 0,
            ]);
            // Tháng hiện tại không tồn tại trong cơ sở dữ liệu
            // Xử lý tình huống này theo yêu cầu của bạn
        }

        $revenue = Revenue::whereYear('dayrevenue', $currentYear)
                        ->whereMonth('dayrevenue', $currentMonth)
                        ->first();
        $revenue2 = Revenue::whereYear('dayrevenue', $currentYear)->pluck('revenue')->toArray();
        $revenueValues = json_encode($revenue2);
        // dd($revenueValues);
        $products = Product::orderBy('idproduct', 'asc')->get();
        $countproduct = $products->count();
        $category = Category::pluck('namecategory')->toArray();
        $categoryvalue = "'" . implode("','", $category) . "'";
        $products2 = Product::orderBy('idcategory', 'asc')->get();
        $productCounts = $products2->groupBy('idcategory')->map(function ($products2) {
            return $products2->count();
        });
        $array = json_decode($productCounts, true);
        $result = '[' . implode(',', $array) . ']';
        // dd($result);
        // Kết quả sẽ là một associative array với key là idcategory và value là số lượng sản phẩm của từng idcategory
        $countuser = User::where('role', 'customer')->get()->count();
        
        $sender_ids = Message::select('sender_id')
                    ->where('receiver_id', $user->id)
                    ->distinct('sender_id')
                    ->orderBy('created_at', 'asc')
                    ->take(5)
                    ->pluck('sender_id');

        $latest_messages = [];

        foreach ($sender_ids as $sender_id) {
            $latest_message = Message::where(function($query) use ($user, $sender_id) {
                                    $query->where('sender_id', $user->id)
                                        ->where('receiver_id', $sender_id);
                                })
                                ->orWhere(function($query) use ($user, $sender_id) {
                                    $query->where('sender_id', $sender_id)
                                        ->where('receiver_id', $user->id);
                                })
                                ->orderBy('created_at', 'desc')
                                ->first();
            $latest_messages[] = $latest_message;
        }
        usort($latest_messages, function($a, $b) {
            return  strtotime($b->created_at) - strtotime($a->created_at) ;
        });

        return view('Admin', ['user' => $user,
                              'revenue' => $revenue,
                              'currentMonth' => $currentMonth,
                              'currentYear' => $currentYear ,
                              'revenueValues' => $revenueValues,
                              'countproduct' => $countproduct,
                              'categoryvalue' => $categoryvalue,
                              'result' => $result,
                              'countuser' => $countuser,
                              'messages' => $latest_messages,]);
    }


    public function viewLoginAdmin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.page');
        } else {
            return view('Loginadmin');
        }
    }


    public function loginAdmin(Request $request)
    {
        // Kiểm tra tính hợp lệ của đầu vào
        $this->validate($request, ['email' => 'required|email',
                                'password' => 'required|min:6']);
        
        // Lấy thông tin đăng nhập từ đầu vào
        $credentials = $request->only('email', 'password');
        

        // Thực hiện đăng nhập và kiểm tra tính hợp lệ
        if (Auth::attempt($credentials, $request->remember)) {
            // Nếu đăng nhập thành công, kiểm tra vai trò của người dùng
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Chuyển hướng đến trang người dùng
                // if ($request->remember) {                  
                //     auth()->user()->remember_token = Str::random(60);
                //     auth()->user()->save();
                //     Cookie::queue('remember_token', auth()->user()->remember_token, 1440);
                // }
                return redirect()->route('admin.page');
            } else {
                // Nếu vai trò không phải admin, đăng xuất và chuyển hướng đến trang đăng nhập với thông báo lỗi
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
            }
        } else {
            // Nếu đăng nhập không thành công, chuyển hướng đến trang đăng nhập và hiển thị thông báo lỗi
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }
    }


    public function logOutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Loginadmin');
    }




    public function viewCategory()
    {   
        $user = Auth::user();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Category', ['user' => $user, 'category' => $category, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }


    public function viewProduct()
    {   
        $user = Auth::user();
        $products = Product::orderBy('idproduct', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Product', ['user' => $user, 'products' => $products, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function viewOrder()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 1)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Order', ['user' => $user, 'products' => $products, 'cart' => $cart, 'category2' => $category2, 'category' => $category, 'category3' => $category3]);
    }

    public function viewHistory()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 2)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('History', ['user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function viewDenyorder()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 3)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Denyorder', ['user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }
    

    public function addCategory(Request $request)
    {   
        $input = $request->all();
        $category = Category::create([
            'namecategory' => $input['namecategory'],
            'iconcategory' => $input['device'],
        ]);
        return back();
    }

    public function updateCategory(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        $category = Category::find($input['idcategory']);
        $category->namecategory = $input['namecategory'];
        $category->iconcategory = $input['device'];
        // dd($category);
        $category->save();
        return back();
    }

    public function deleteCategory(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        $category = Category::find($input['idcategory']);
        $category->delete();
        // dd($category);
        return back();
    }

    public function findCategory(Request $request)
    {   
        $search = $request->input('search');
        // $category = Category::all();
        if(!$search || !is_string($search)){
            // Nếu không có giá trị search hoặc không phải chuỗi thì trả về tất cả bản ghi
            $category = Category::all();
        } else {
            // Nếu có giá trị search và là chuỗi thì truy vấn với điều kiện
            $category = Category::where('namecategory', 'like', '%'.$search.'%')->get();
        }
        // dd($category);
        $html = '';
        foreach($category as $category) {
            $html .= '<tr>';
            $html .= '<td>' . $category->idcategory . '</td>';
            $html .= '<td>' . $category->namecategory . '</td>';
            $html .= '<td><i class="' . $category->iconcategory . '"></i></td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#updateModalcategory" data-category-name="' . $category->namecategory . '" data-category-id="' . $category->idcategory . '"><i class="bi bi-pencil-square"></i> Change</button></td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalcategory" data-category-name="' . $category->namecategory . '" data-category-id="' . $category->idcategory . '"><i class="bi bi-trash"></i> Delete</button></td>';
            $html .= '</tr>';
        }
        return response()->json(['html' => $html]);
    }



    public function addProduct(Request $request)
    {
        $product = new Product;

        $product->nameproduct = $request->input('nameproduct');
        $product->price = $request->input('price');
        $product->inventoryquantity = $request->input('quantity');
        $product->idcategory = $request->input('idcategory');
        $product->review = $request->input('review');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('productimg/');
            $image->move($path, $filename);
            $product->image = '/productimg/' . $filename;
        }

        $product->save();

        return redirect()->back();
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->input('idproduct'));
        $product->nameproduct = $request->input('nameproduct');
        $product->price = $request->input('price');
        $product->inventoryquantity = $request->input('quantity');
        $product->idcategory = $request->input('idcategory');
        $product->review = $request->input('review');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('productimg/');
            $image->move($path, $filename);
            $product->image = '/productimg/' . $filename;
        }

        $product->save();

        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {   
        $input = $request->all();
        $products = Product::find($input['idproduct']);
        $products->delete();
        // dd($category);
        return back();
    }

    public function findProduct(Request $request)
    {   
        $search = $request->input('search');
        // $category = Category::all();
        if(!$search || !is_string($search)){
            // Nếu không có giá trị search hoặc không phải chuỗi thì trả về tất cả bản ghi
            $products = Product::all();
        } else {
            // Nếu có giá trị search và là chuỗi thì truy vấn với điều kiện
            $products = Product::where('nameproduct', 'like', '%'.$search.'%')->get();
        }
        // dd($category);
        $html = '';
        foreach($products as $product) {
            $html .= '<tr>';
            $html .= '<td>' . $product->idproduct . '</td>';
            $html .= '<td>' . $product->nameproduct . '</td>';
            $html .= '<td>' . $product->price . '</td>';
            $html .= '<td>' . $product->inventoryquantity . '</td>';
            $html .= '<td><img src="' . $product->image . '" class="imgproduct"></td>';
            $html .= '<td>' . $product->review . '</td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#updateModalproduct"
                        data-product-name="' . $product->nameproduct . '"
                        data-product-id="' . $product->idproduct . '"
                        data-product-price="' . $product->price . '"
                        data-product-quantity="' . $product->inventoryquantity . '"
                        data-product-review="' . $product->review . '"><i
                            class="bi bi-pencil-square"></i> Change</button>
                </td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalproduct"
                        data-product-name="' . $product->nameproduct . '"
                        data-product-id="' . $product->idproduct . '"
                        data-product-price="' . $product->price . '"
                        data-product-quantity="' . $product->inventoryquantity . '"
                        data-product-namecategory="' . $product->category->namecategory . '"
                        data-product-review="' . $product->review . '"><i class="bi bi-trash"></i>
                        Delete</button></td>';
            $html .= '</tr>';
        }

        return response()->json(['html' => $html]);
    }


    public function acceptOrder(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        // $cart = Cart::find($input['idcart']);
        Cart::where('idcart', $input['idcart'])->update(['status' => 2]); 
        $currentDate = Carbon::now();
        // dd($currentDate);

        $revenue = Revenue::whereDate('dayrevenue', $currentDate->toDateString())->first();

        if($revenue) {
            // Ngày hiện tại đã có trong CSDL
            $revenue->revenue += $input['totalprice'];
            $revenue->ordernumber += 1;
            $revenue->orderproduct += $input['quatifier'];
            
            $revenue->save();
        } else {
            $revenue = new Revenue;
            $revenue->dayrevenue = $currentDate ;
            $revenue->revenue = $input['totalprice'];
            $revenue->ordernumber = 1;
            $revenue->orderproduct += $input['quatifier'];
            $revenue->save();
        }

        $notification = new Notification;
        $notification->id = $input['id'];
        $notification->notification = 'Your order for product "' . $input['nameproduct'] . '" x' . $input['quatifier'] . ' is on its way to you';
        $notification->image = $input['image'];
        $notification->save();
        return back();
    }

    public function denyOrder(Request $request)
    {   
        $input = $request->all();
        Cart::where('idcart', $input['idcart'])->update(['status' => 3]); 
        $notification = new Notification;
        $notification->id = $input['id'];
        $notification->notification = 'Your order for product "' . $input['nameproduct'] . '" x' . $input['quatifier'] . ' is deny because "' . $input['reason'] . '"';
        $notification->image = $input['image'];
        $notification->save();
        return back();
    }

    public function viewProfile()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 3)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Profileadmin', ['user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function changeProfile(Request $request)
    {   
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('avatarsadmin'), $avatarName);
            $user->avatar = '/avatarsadmin/' . $avatarName;
        } else {
            $user->avatar = $user->avatar;
        }
        $user->save();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 3)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return redirect()->route('admin.profile');
    }

    public function viewSetting()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 3)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Settingadmin', ['user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function viewMessage(Request $request)
    {   
        $user = Auth::user();
        $messages = Message::orderby('created_at', 'desc')->first();
        // dd($messages);
        if($user->id != $messages['sender_id']){
            $usersend = $messages['sender_id'];
        }else{
            $usersend = $messages['receiver_id'];
        }
        // $usersend = $request['sender_id'];
        // // dd($usersend);
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 2)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        $usersendmessage = User::where('id', $usersend)->first();
        $messages = $user->messages_received()
                ->with('sender')
                // ->where('sender_id', $usersend)
                ->Where(function ($query) use ($user, $usersend) {
                    $query->where('sender_id', $usersend)
                          ->where('receiver_id',  $user->id);
                })
                ->orWhere(function ($query) use ($user, $usersend) {
                    $query->where('sender_id', $user->id)
                          ->where('receiver_id', $usersend);
                })
                ->latest('created_at')
                ->take(20)
                ->get()
                ->reverse();  
                
        $sender_ids = Message::select('sender_id')
                    ->where('receiver_id', $user->id)
                    ->distinct('sender_id')
                    ->orderBy('created_at', 'asc')
                    ->pluck('sender_id');

        $latest_messages = [];

        foreach ($sender_ids as $sender_id) {
            $latest_message = Message::where(function($query) use ($user, $sender_id) {
                                    $query->where('sender_id', $user->id)
                                        ->where('receiver_id', $sender_id);
                                })
                                ->orWhere(function($query) use ($user, $sender_id) {
                                    $query->where('sender_id', $sender_id)
                                        ->where('receiver_id', $user->id);
                                })
                                ->orderBy('created_at', 'desc')
                                ->first();
            $latest_messages[] = $latest_message;
        }
        usort($latest_messages, function($a, $b) {
            return  strtotime($b->created_at) - strtotime($a->created_at) ;
        });

        return view('Messageadmin', ['latest_messages' => $latest_messages,'usersendmessage' => $usersendmessage,'messages' => $messages,'user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function reloadMessage(Request $request)
    {   
        $sender_id = $request['sender_id'];
        // $messages = Message::orderby('created_at', 'desc')->first();
        $usersendmessage = User::select('id','name', 'avatar')->where('id', $sender_id)->first();
        $usersend = $request['sender_id'];;
        $user = Auth::user();
        $messages = $user->messages_received()
                ->with('sender')
                // ->where('sender_id', $usersend)
                ->Where(function ($query) use ($user, $usersend) {
                    $query->where('sender_id', $usersend)
                          ->where('receiver_id',  $user->id);
                })
                ->orWhere(function ($query) use ($user, $usersend) {
                    $query->where('sender_id', $user->id)
                          ->where('receiver_id', $usersend);
                })
                ->latest('created_at')
                ->take(20)
                ->get()
                ->reverse();     


        $html = '<div class="d-flex align-items-center">
                <img src="'. $usersendmessage->avatar .'" class="mr-2 fiximg">
                <input type="hidden" value="'. $usersendmessage->id .'" name="sender_id"
                                                class="sender_id"></input>
                <span class="font-weight-bold">'. $usersendmessage->name .'</span>
            </div>
            <hr>
            <div id="message-container" style="max-height: 450px;height: 450px;overflow-x: auto;padding: 0 2em;" class="capnhat">';
            
        foreach ($messages as $message) {
            if($message->sender_id == $user->id) {
                $html .= '<div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column align-items-end">
                                        <span style="background-color: #3A3B3CD1;color: #FFFFFF;padding: .25em .75em;border-radius: 1em;max-width: 500px;display: inline-block;word-wrap: break-word;width: fit-content;">'. $message->message .'</span>
                                        <span style="font-size:0.75em; margin-top:.5em"> (Send at: '. $message->created_at .')</span>
                                    </div>
                                    <img src="'. $user->avatar .'" class="ml-2 fiximg">
                                </div>
                            </div>
                            <br>';
            } else {
                $html .= '<div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <img src="'. $message->sender->avatar .'" class="mr-2 fiximg">
                                    <div class="d-flex flex-column">
                                        <span style="background-color: #3A3B3CD1;color: #FFFFFF;padding: .25em .75em;border-radius: 1em;max-width: 500px;display: inline-block;word-wrap: break-word;width: fit-content;">'. $message->message .'</span>
                                        <span style="font-size:0.75em; margin-top:.5em"> (Send at: '. $message->created_at .')</span>
                                    </div>
                                </div>
                            </div>
                            <br>';
            }
        }
        $html .= '</div>';
        $html .= '<div class="d-flex align-items-center justify-content-between" style="padding:0 2em;">
                        <textarea name="messagecontent" style="width: 93%;padding: 0 0.5em;border-radius: 5px;border: 1px solid black;resize: none;height: 3em !important;" oninput="autoGrow(this)"></textarea>
                        <button type="button" class="btn btn-primary" id="buttonsend" style="height:3em">Send</button>
                    </div>';


        return response()->json(['html' => $html]);
        // return response()->json([
        //     'usersendmessage' => $usersendmessage,
        //     'messages' => $messages
        // ]);










    }

    public function addMessage(Request $request)
    {   
        $user = Auth::user();
        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $request->input('sender_id'),
            'message' => $request->input('messagecontent'),
            'read' => 0,
        ]);
    }

    public function viewActivity()
    {   
        $user = Auth::user();
        $users = User::orderBy('id', 'asc')->where('role', 'customer')->get();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 3)->orderBy('updated_at', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Activitylog', ['users' => $users,'user' => $user, 'products' => $products, 'cart' => $cart, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }

    public function verifyEmail(Request $request)
    {
        $user = Auth::user();
        $useremail = $user->email;
        $name = $user->name;
        $random_number = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->codeverifyemail = $random_number;
        $user->codeverifyemailend = Carbon::now()->addMinutes(5);
        $user->save();
        Mail::send('Verifyemail', compact('name','random_number'), function($email) use($request, $name, $random_number){
            $email->subject('Verify you email address', $name,$random_number);
            $email->to($request->email);
        });
        $category = Category::orderBy('idcategory', 'asc')->get();
        $category2 = Category::orderBy('idcategory', 'asc')->get();
        $category3 = Category::orderBy('idcategory', 'asc')->get();
        return view('Codeverifyemailadmin', ['useremail' => $useremail, 'user' => $user, 'category' => $category, 'category2' => $category2, 'category3' => $category3]);
    }


    public function verifyEmailcode(Request $request)
    {
        $user = Auth::user();
        $useremail = $user->email;
        $endtime = Carbon::now();
        $timecodeend = $user->codeverifyemailend;
        if($user->codeverifyemail == $request->code && $timecodeend > $endtime){
            $user->verifyemail = 1;
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect()->route('admin.setting');
        }else{
            $category = Category::orderBy('idcategory', 'asc')->get();
            $category2 = Category::orderBy('idcategory', 'asc')->get();
            $category3 = Category::orderBy('idcategory', 'asc')->get();
            return view('Codeverifyemailadmin', ['useremail' => $useremail, 'user' => $user, 'category' => $category, 'category2' => $category2, 'category3' => $category3])->withErrors(['error' => 'Code has expired or incorrect!']);
        }
    }


    public function changePassWord(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if(!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->withErrors(['oldpassword' => 'The old password is incorrect. Please try again!']);
            
        }
        
        if($request->oldpassword == $request->newpassword) {
            return redirect()->back()->withErrors(['oldnewpassword' => 'The old password cannot be the same as the new password. Please try again!']);
        }
        
        if($request->newpassword !== $request->newpassword2){
            return redirect()->back()->withErrors(['newpassword' => 'The new passwords do not match. Please try again!']);
        }
        
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return redirect()->back()->withErrors(['success' => 'Password changed successfully!']);
        
    }

   
}
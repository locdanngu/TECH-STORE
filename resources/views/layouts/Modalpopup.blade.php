<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout.admin') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal category-->
<div class="modal fade" id="addModalcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.addcategory') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add more Category?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Category</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="namecategory">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:100%">Choice Icon
                        Bellow</span>
                </div>
                <!-- <span>Choice Icon:</span> -->
                <div class="allradio">
                    <div class="radio">
                        <input type="radio" name="device" value="bi bi-earbuds" required>
                        <label for="earbuds"><i class="bi bi-earbuds"></i></label>

                        <input type="radio" name="device" value="bi bi-headphones" required>
                        <label for="headphones"><i class="bi bi-headphones"></i></label>

                        <input type="radio" name="device" value="bi bi-phone" required>
                        <label for="phone"><i class="bi bi-phone"></i></label>

                        <input type="radio" name="device" value="bi bi-mic" required>
                        <label for="phone"><i class="bi bi-mic"></i></label>

                        <input type="radio" name="device" value="bi bi-laptop" required>
                        <label for="phone"><i class="bi bi-laptop"></i></label>

                        <input type="radio" name="device" value="bi bi-tv" required>
                        <label for="phone"><i class="bi bi-tv"></i></label>

                        <input type="radio" name="device" value="bi bi-controller" required>
                        <label for="phone"><i class="bi bi-controller"></i></label>

                        <input type="radio" name="device" value="bi bi-display" required>
                        <label for="phone"><i class="bi bi-display"></i></label>

                        <input type="radio" name="device" value="bi bi-mouse-fill" required>
                        <label for="phone"><i class="bi bi-mouse-fill"></i></label>

                        <input type="radio" name="device" value="bi bi-keyboard" required>
                        <label for="phone"><i class="bi bi-keyboard"></i></label>

                        <input type="radio" name="device" value="bi bi-usb-plug" required>
                        <label for="phone"><i class="bi bi-usb-plug"></i></label>

                        <input type="radio" name="device" value="bi bi-pc-display" required>
                        <label for="phone"><i class="bi bi-pc-display"></i></label>

                        <input type="radio" name="device" value="bi bi-camera" required>
                        <label for="phone"><i class="bi bi-camera"></i></label>

                        <input type="radio" name="device" value="bi bi-hammer" required>
                        <label for="phone"><i class="bi bi-hammer"></i></label>

                        <input type="radio" name="device" value="bi bi-router" required>
                        <label for="phone"><i class="bi bi-router"></i></label>

                        <input type="radio" name="device" value="bi bi-smartwatch" required>
                        <label for="phone"><i class="bi bi-smartwatch"></i></label>

                        <input type="radio" name="device" value="bi bi-speaker" required>
                        <label for="phone"><i class="bi bi-speaker"></i></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Modal category-->
<div class="modal fade" id="updateModalcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.updatecategory') }}" class="modal-content">
            @csrf
            <input type="hidden" name="idcategory" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Category</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="namecategory" value="">
                </div>
                <span>Choice Icon:</span>
                <div class="allradio">
                    <div class="radio">
                        <input type="radio" name="device" value="bi bi-earbuds" required>
                        <label for="earbuds"><i class="bi bi-earbuds"></i></label>

                        <input type="radio" name="device" value="bi bi-headphones" required>
                        <label for="headphones"><i class="bi bi-headphones"></i></label>

                        <input type="radio" name="device" value="bi bi-phone" required>
                        <label for="phone"><i class="bi bi-phone"></i></label>

                        <input type="radio" name="device" value="bi bi-mic" required>
                        <label for="phone"><i class="bi bi-mic"></i></label>

                        <input type="radio" name="device" value="bi bi-laptop" required>
                        <label for="phone"><i class="bi bi-laptop"></i></label>

                        <input type="radio" name="device" value="bi bi-tv" required>
                        <label for="phone"><i class="bi bi-tv"></i></label>

                        <input type="radio" name="device" value="bi bi-controller" required>
                        <label for="phone"><i class="bi bi-controller"></i></label>

                        <input type="radio" name="device" value="bi bi-display" required>
                        <label for="phone"><i class="bi bi-display"></i></label>

                        <input type="radio" name="device" value="bi bi-mouse-fill" required>
                        <label for="phone"><i class="bi bi-mouse-fill"></i></label>

                        <input type="radio" name="device" value="bi bi-keyboard" required>
                        <label for="phone"><i class="bi bi-keyboard"></i></label>

                        <input type="radio" name="device" value="bi bi-usb-plug" required>
                        <label for="phone"><i class="bi bi-usb-plug"></i></label>

                        <input type="radio" name="device" value="bi bi-pc-display" required>
                        <label for="phone"><i class="bi bi-pc-display"></i></label>

                        <input type="radio" name="device" value="bi bi-camera" required>
                        <label for="phone"><i class="bi bi-camera"></i></label>

                        <input type="radio" name="device" value="bi bi-hammer" required>
                        <label for="phone"><i class="bi bi-hammer"></i></label>

                        <input type="radio" name="device" value="bi bi-router" required>
                        <label for="phone"><i class="bi bi-router"></i></label>

                        <input type="radio" name="device" value="bi bi-smartwatch" required>
                        <label for="phone"><i class="bi bi-smartwatch"></i></label>

                        <input type="radio" name="device" value="bi bi-speaker" required>
                        <label for="phone"><i class="bi bi-speaker"></i></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>



<!-- Delete Modal category-->
<div class="modal fade" id="deleteModalcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.deletecategory') }}" class="modal-content">
            @csrf
            <input type="hidden" name="idcategory" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">ID Category</span>
                    <span name="idcategory" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Category</span>
                    <span name="namecategory" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Number Product</span>
                    <span name="numberproduct" style="display: flex;align-items: center;margin-left: 2em;color:red;font-weight:bold"></span>
                </div>
                <span style="color:red">Warning, You can only delete this category if the quantity of products is equal to 0!</span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>

<!-- Can't Delete Modal category -->
<div class="modal fade" id="deleteModalcategory2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.deletecategory') }}" class="modal-content">
            @csrf
            <input type="hidden" name="idcategory" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">ID Category</span>
                    <span name="idcategory" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Category</span>
                    <span name="namecategory" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Number Product</span>
                    <span name="numberproduct" style="display: flex;align-items: center;margin-left: 2em;color:red;font-weight:bold"></span>
                </div>
                <span style="color:red">Warning, You can only delete this category if the quantity of products is equal to 0!</span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" style="cursor: not-allowed" disabled>Delete</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Modal product-->
<div class="modal fade" id="addModalproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.addproduct') }}" class="modal-content"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add more Product?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Product</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="nameproduct">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="price">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                    <input type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="quantity">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                    <select style="width: 70%" name="idcategory">
                        @foreach($category2 as $category)
                        <option value="{{ $category->idcategory }}">{{ $category->idcategory }}.
                            {{ $category->namecategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                    <input class="form-control" type="file" id="formFile" accept="image/*" style="max-width:100%"
                        onchange="previewImage(event)" name="image" required>
                </div>
                <img id="preview" src="" alt="Preview Image" style="max-width:30%;margin-bottom:1em">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Review</span>
                    <textarea type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="review"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>


<!-- Update Modal product-->
<div class="modal fade" id="updateModalproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.updateproduct') }}" class="modal-content"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idproduct" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Product?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Product</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="nameproduct">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="price">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                    <input type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="quantity">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                    <select style="width: 70%" name="idcategory">
                        @foreach($category3 as $cat)
                        <option value="{{ $cat->idcategory }}">{{ $cat->idcategory }}. {{ $cat->namecategory }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Image</span>
                    <input class="form-control" type="file" id="formFile" accept="image/*" style="max-width:100%"
                        onchange="previewImage2(event)" name="image" required>
                </div>
                <img id="preview2" src="" alt="Preview Image" style="max-width:30%;margin-bottom:1em">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Review</span>
                    <textarea class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="review"
                        style="height: 5em"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal product-->
<div class="modal fade" id="deleteModalproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.deleteproduct') }}" class="modal-content"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idproduct" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Product</span>
                    <span name="nameproduct" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <span name="price" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                    <span name="quantity" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Category</span>
                    <span name="namecategory" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width:100%">Review</span>
                    <span name="review" style="display: flex;align-items: center;margin-top:1em"></span>
                </div>
                <span style="color:red">Warning, deleting will permanently erase the item information!</span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Delete</button>
            </div>
        </form>
    </div>
</div>


<!-- Accept Order Modal-->
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="{{ route('admin.acceptorder') }}">
            @csrf
            <input type="hidden" name="idcart" value="">
            <input type="hidden" name="image" value="">
            <input type="hidden" name="idproduct" value="">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="nameproduct" value="">
            <input type="hidden" name="quatifier" value="">
            <input type="hidden" name="totalprice" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to deliver this order?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Id Product</span>
                    <span name="idproduct" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Product</span>
                    <span name="nameproduct" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                    <span name="quatifier" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Total Price</span>
                    <span name="totalprice" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Accept</button>
            </div>
        </form>
    </div>
</div>

<!-- Deny Order Modal-->
<div class="modal fade" id="denyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="{{ route('admin.denyorder') }}">
            @csrf
            <input type="hidden" name="idcart" value="">
            <input type="hidden" name="image" value="">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="nameproduct" value="">
            <input type="hidden" name="quatifier" value="">
            <input type="hidden" name="totalprice" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deny deliver this order?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name Product</span>
                    <span name="nameproduct" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                    <span name="quatifier" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Total Price</span>
                    <span name="totalprice" style="display: flex;align-items: center;margin-left: 2em;"></span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Reason</span>
                    <textarea class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="reason"
                        style="height: 10em"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger">Deny</button>
            </div>
        </form>
    </div>
</div>

<!-- Lock modal -->
<div class="modal fade" id="lockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lock This Account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="modal-content" method="POST" action="{{ route('admin.lockaccount') }}">
                @csrf
                <input type="hidden" name="iduser" value="">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Id User</span>
                        <span name="iduser" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name User</span>
                        <span name="nameuser" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        <span name="email" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                        <span name="phone" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Status Account</span>
                        <span name="" style="display: flex;align-items: center;margin-left: 2em;">Normal</span>
                    </div>
                    <span style="color:red">Warning, If you do this, the user of this account won't be able to use
                        it.</span>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger">Lock</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- unLock modal -->
<div class="modal fade" id="unlockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Unlock This Account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="modal-content" method="POST" action="{{ route('admin.unlockaccount') }}">
                @csrf
                <input type="hidden" name="iduser" value="">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Id User</span>
                        <span name="iduser" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name User</span>
                        <span name="nameuser" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        <span name="email" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                        <span name="phone" style="display: flex;align-items: center;margin-left: 2em;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Status Account</span>
                        <span name="" style="display: flex;align-items: center;margin-left: 2em;">Lock</span>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Unlock</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
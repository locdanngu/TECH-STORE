<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">{{ $senderIdsCount }}</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
            Message Center
        </h6>
        @foreach($lastmessages as $message)
        <div class="dropdown-item d-flex align-items-center">
            @if($message->sender_id == $user->id)
            <input type="hidden" value="{{ $message->receiver_id }}" name="sender_id">
            <button style="background-color: transparent; border:0" class="d-flex">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{ $message->receiver->avatar }}" alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate" style="text-align: left;">{{ $message->message }}</div>
                    <div class="small text-gray-500" style="text-align: left;">Your ·
                        {{ \Carbon\Carbon::now()->diffForHumans($message->created_at, true) }}
                    </div>
                </div>
            </button>
            @else
            <input type="hidden" value="{{ $message->sender_id }}" name="sender_id">
            <button style="background-color: transparent; border:0" class="d-flex">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{ $message->sender->avatar }}" alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate" style="text-align: left;">{{ $message->message }}</div>
                    <div class="small text-gray-500" style="text-align: left;">{{ $message->sender->name }} ·
                        {{ \Carbon\Carbon::now()->diffForHumans($message->created_at, true) }}
                    </div>
                </div>
            </button>
            @endif
        </div>
        @endforeach
        <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.message') }}">Read More
            Messages</a>
    </div>
</li>
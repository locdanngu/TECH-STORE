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
        <form method="POST" action="" class="modal-content">
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
                        aria-describedby="inputGroup-sizing-default" required>
                </div>
                <span>Choice Icon:</span>
                <div class="allradio">
                    <div class="radio">
                        <input type="radio" name="device" value="earbuds" required>
                        <label for="earbuds"><i class="bi bi-earbuds"></i></label>

                        <input type="radio" name="device" value="headphones" required>
                        <label for="headphones"><i class="bi bi-headphones"></i></label>

                        <input type="radio" name="device" value="phone" required>
                        <label for="phone"><i class="bi bi-phone"></i></label>
                        
                        <input type="radio" name="device" value="mic" required>
                        <label for="phone"><i class="bi bi-mic"></i></label>

                        <input type="radio" name="device" value="laptop" required>
                        <label for="phone"><i class="bi bi-laptop"></i></label>

                        <input type="radio" name="device" value="tv" required>
                        <label for="phone"><i class="bi bi-tv"></i></label>

                        <input type="radio" name="device" value="controller" required>
                        <label for="phone"><i class="bi bi-controller"></i></label>

                        <input type="radio" name="device" value="display" required>
                        <label for="phone"><i class="bi bi-display"></i></label>

                        <input type="radio" name="device" value="mouse" required>
                        <label for="phone"><i class="bi bi-mouse-fill"></i></label>

                        <input type="radio" name="device" value="keyboard" required>
                        <label for="phone"><i class="bi bi-keyboard"></i></label>

                        <input type="radio" name="device" value="usb" required>
                        <label for="phone"><i class="bi bi-usb-plug"></i></label>

                        <input type="radio" name="device" value="pc" required>
                        <label for="phone"><i class="bi bi-pc-display"></i></label>

                        <input type="radio" name="device" value="camera" required>
                        <label for="phone"><i class="bi bi-camera"></i></label>
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


<!-- Add Modal product-->
<div class="modal fade" id="addModalproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add more Product?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Save</a>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="changePassModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
            	<input type="hidden" id ="changepass_id" value="<?=$_SESSION['user']['id']?>">
	            <div class="form-group col">
	                <label for="password">Password</label>
	                <input type="password" name="password" class="form-control" id="password" placeholder="Password"  required="">
	            </div>
	            <div class="form-group col">
	                <label for="password_confirmation">Password Confirmation</label>
	                <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" required="">
	            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id ="btnChangePass" class="btn btn-danger">Confirm</button>
            </div>
        </div>
        </div>
    </div>

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Balanga City © Copyright 2019</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
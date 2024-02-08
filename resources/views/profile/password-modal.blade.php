<h5 class="title pb-3">Update Password</h5>

<form action="{{ route('profile.password.update') }}" method="post" ajax-form data-modal="#ajax-modal">
    @csrf

    @method('put')

    <div class="row gy-4">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="old_password">Old Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" id="old_password" name="old_password" placeholder="Enter old password" required>
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="password">New Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter new password" required>
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Re-enter new password" required>
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-12">
            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                <li><button type="submit" class="btn btn-lg btn-primary">Save</button></li>
                <li><button type="button" class="link link-light" modal-close>Cancel</button></li>
            </ul>
        </div>
    </div>
</form>
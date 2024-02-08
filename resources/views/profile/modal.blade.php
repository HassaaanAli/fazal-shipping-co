<h5 class="title pb-3">Update Profile</h5>

<form action="{{ route('profile.update') }}" method="post" ajax-form data-modal="#ajax-modal" data-event="profile.updated">
    @csrf

    @method('put')

    <div class="row gy-4">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Enter full name" required>
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="Enter phone number" required>
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="alt_phone">Alternate Phone Number</label>
                <input type="text" class="form-control form-control-lg" id="alt_phone" name="alt_phone" value="{{ auth()->user()->alt_phone }}" placeholder="Enter alternate phone number">
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="address">Address</label>
                <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ auth()->user()->address }}" placeholder="Enter your address">
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
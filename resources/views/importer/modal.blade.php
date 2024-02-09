@php
$isEdit = isset($importer) ? true : false;
$url = $isEdit ? route('importer.update', $importer->uuid) : route('importer.store');
@endphp
<h5 class="title pb-3">{{ $isEdit ? 'Update' : 'Add New' }} Importer</h5>

<form action="{{ $url }}" method="post" ajax-form data-modal="#ajax-modal" data-datatable="#importer-dt">
    @csrf
    @if ($isEdit)
    @method('put')
    @endif
    @error('message')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="row gy-4">
        <div class="col-md-6 mt-3 mb-4">
            <div class="form-group">
                <label class="form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                <select class="form-control form-control-lg {{ $errors->has('company_name') ? 'is-invalid' : '' }}" id="company_name" name="company_name" value="{{ $isEdit ? $importer->company_name : '' }}" required>
                    <option value="">Select Company Name</option>
                    @foreach ($company as $company)
                    <option value="{{ $company->name }}" {{ $isEdit && $company->name === $importer->company_name ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                    @endforeach
                </select>
                @error('company_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mt-3 mb-4">
            <div class="form-group">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="name" oninput="this.value = this.value.toUpperCase()" name="name" value="{{ $isEdit ? $importer->name : '' }}" placeholder="Enter company name">
                @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
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

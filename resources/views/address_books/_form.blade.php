@csrf

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $addressBook->title ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="contact_name" class="form-label">Contact Name</label>
        <input type="text" name="contact_name" id="contact_name" class="form-control" value="{{ old('contact_name', $addressBook->contact_name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $addressBook->contact_number ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="address_line1" class="form-label">Address Line 1</label>
        <input type="text" name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1', $addressBook->address_line1 ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="address_line2" class="form-label">Address Line 2</label>
        <input type="text" name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2', $addressBook->address_line2 ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="address_line3" class="form-label">Address Line 3</label>
        <input type="text" name="address_line3" id="address_line3" class="form-control" value="{{ old('address_line3', $addressBook->address_line3 ?? '') }}">
    </div>

    <div class="col-md-4 mb-3">
        <label for="pincode" class="form-label">Pincode</label>
        <input type="text" name="pincode" id="pincode" class="form-control" value="{{ old('pincode', $addressBook->pincode ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $addressBook->city ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label for="state" class="form-label">State</label>
        <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $addressBook->state ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $addressBook->country ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-check mt-4">
            <input type="checkbox" class="form-check-input" name="is_default_from" id="is_default_from"
                {{ old('is_default_from', $addressBook->is_default_from ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_default_from">Set as Default From Address</label>
        </div>

        <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" name="is_default_to" id="is_default_to"
                {{ old('is_default_to', $addressBook->is_default_to ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_default_to">Set as Default To Address</label>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mt-3">Save Address</button>

<form id="updateMyContactForm" action="{{ route('my-contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.contact_name') }}</label>
                    <input type="text" name="name" id="name" value="{{ $contact->name }}" placeholder="{{ __('common.enter_social_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.contact_information') }}</label>
                    <input type="text" name="info" id="info" value="{{ $contact->info }}" placeholder="{{ __('common.enter_social_info') }}">
                    <div class="infoError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.contact_icon') }}</label>
                    <input type="text" name="icon" id="icon" value="{{ $contact->icon }}" placeholder="{{ __('common.enter_social_icon_class') }}">
                    <div class="iconError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.update') }}</button>
    </div>
</form>
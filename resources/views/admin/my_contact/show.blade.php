<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.contact_name') }}</label>
                <input type="text" value="{{ $contact->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.contact_information') }}</label>
                <input type="text" value="{{ $contact->info }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.contact_icon') }}</label>
                <input type="text" value="{{ $contact->icon }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>

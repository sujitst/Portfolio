<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.logo') }}</label>
                <img src="{{ asset('upload/site-setting/' . $setting->logo) }}" alt="logo" class="img_show_view">

                <label class="w-100 text-center mt-3">{{ __('common.favicon') }}</label>
                <img src="{{ asset('upload/site-setting/' . $setting->fave_icon) }}" alt="icon" class="img_show_view">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.title') }}</label>
                <input type="text" value="{{ $setting->title }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.sub_title') }}</label>
                <input type="text" value="{{ $setting->sub_title }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>
<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.social_media_logo') }}</label>
                <img src="{{ asset('upload/media/' . $media->image) }}" alt="image" class="img_show_view">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.social_media_name') }}</label>
                <input type="text" value="{{ $media->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.social_media_url') }}</label>
                <input type="text" value="{{ $media->link }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>
<form id="editSocialMediaForm" action="{{ route('social-media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.social_media_name') }}</label>
                    <input type="text" name="name" id="name" value="{{ $media->name }}" placeholder="{{ __('common.enter_social_media_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.social_media_url') }}</label>
                    <input type="text" name="link" id="link" value="{{ $media->link }}" placeholder="{{ __('common.enter_social_media_link') }}">
                    <div class="linkError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.social_media_logo') }}</label>
                    <input type="file" name="image" id="image" placeholder="File input">
                    <img src="{{ asset('upload/media/' . $media->image) }}" id="imagePreview" alt="image">
                    <div class="imageError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.update') }}</button>
    </div>
</form>
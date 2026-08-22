<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.images') }}</label>
                <img src="{{ asset('upload/gallery/images/' . $image->image) }}" alt="Image" class="img_show_view">
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.video') }}</label>
                <video height="140" autoplay class="img_show_view">
                    <source src="{{ asset('upload/gallery/videos/' . $image->video) }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.category_name') }}</label>
                <input type="text" value="{{ $image->category->name }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>

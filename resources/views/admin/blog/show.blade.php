<div class="custom_modal_body">
    @php $images = json_decode($blog->image); @endphp
    
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <label class="w-100 text-center">{{ __('common.images') }}</label>
            @if(!empty($images) && count($images) > 0)
                <div class="multiple_imges_show_view">
                    @foreach($images as $image)
                    <img src="{{ asset('upload/blog/' . $image) }}" alt="image" class="img_show_view">
                    @endforeach
                </div>
            @else
            <p class="text-center text-muted">{{ __('common.no_images_found') }}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.user_name') }}</label>
                <input type="text" value="{{ $blog->user->name }}" readonly>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.blog_title') }}</label>
                <input type="text" value="{{ $blog->title }}" readonly>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.blog_description') }}</label>
                <textarea name="description" readonly>{{ $blog->description }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>
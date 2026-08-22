<form id="createImageForm" action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.category_name') }}</label>
                    <select name="category_id" id="category_id">
                        @foreach($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="categoryNameError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.images') }}</label>
                    <input type="file" name="image" id="image" placeholder="File input">
                    <img src="" id="imagePreview" alt="image" style="display: none">
                    <div class="imageError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.video') }}</label>
                    <input type="file" name="video" id="video" placeholder="{{ __('common.enter_video') }}">
                    <video src="" id="videoPreview" controls autoplay style="display: none;"></video>
                    <div class="videoError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.save') }}</button>
    </div>
</form>
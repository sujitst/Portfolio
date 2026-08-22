<form id="updateImageForm" action="{{ route('image.update', $image->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.category_name') }}</label>
                    <select name="category_id" id="category_id">
                        @foreach($category as $cat)
                        <option value="{{ $cat->id }}" {{ $image->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="categoryNameError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.images') }}</label>
                    <input type="file" name="image" id="image" placeholder="File input">
                    <img src="{{ asset('upload/gallery/images/' . $image->image) }}" style="height: 80px;" id="imagePreview" alt="image">
                    <div class="imageError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.video') }}</label>
                    <input type="file" name="video" id="video" placeholder="{{ __('common.enter_video') }}">
                    @if(!empty($image->video))
                        <video src="{{ asset('upload/gallery/videos/' . $image->video) }}" style="height: 80px; margin-top: 10px;" id="videoPreview" controls autoplay></video>
                    @else
                        <video style="height: 80px; display: none; margin-top: 10px;" id="videoPreview" controls autoplay></video>
                    @endif
                    <div class="videoError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.update') }}</button>
    </div>
</form>
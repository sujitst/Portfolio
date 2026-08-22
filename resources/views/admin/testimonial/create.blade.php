<form id="createTestimonialForm" action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.person_name') }}</label>
                    <input type="text" name="name" id="name" placeholder="{{ __('common.enter_person_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.person_position') }}</label>
                    <input type="text" name="position" id="position" placeholder="{{ __('common.enter_person_position') }}">
                    <div class="positionError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input_form">
                    <label>{{ __('common.rating') }}</label>
                    <input type="number" name="rating" id="rating" step="0.1" min="0"  max="5" placeholder="{{ __('common.enter_rating') }}">
                    <div class="ratingError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.comment') }}</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" placeholder="{{ __('common.text_here') }}"></textarea>
                    <div class="commentError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.person_image') }}</label>
                    <input type="file" name="image" id="image" placeholder="File input">
                    <img src="" id="imagePreview" alt="image" style="display: none">
                    <div class="imageError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addWork">{{ __('common.save') }}</button>
    </div>
</form>
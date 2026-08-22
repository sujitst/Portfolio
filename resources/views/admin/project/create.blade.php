<form id="createProjectForm" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.project_name') }}</label>
                    <input type="text" name="name" id="name" placeholder="{{ __('common.enter_project_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input_form">
                    <label>{{ __('common.enter_rating') }}</label>
                    <input type="number" name="rating" id="rating" step="0.1" min="0"  max="5" placeholder="{{ __('common.enter_rating') }}">
                    <div class="ratingError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.price') }}</label>
                    <input type="text" name="price" id="price" placeholder="{{ __('common.enter_project_price') }}">
                    <div class="priceError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.project_url') }}</label>
                    <input type="text" name="link" id="link" placeholder="{{ __('common.enter_project_url') }}">
                    <div class="linkError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.images') }}</label>
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
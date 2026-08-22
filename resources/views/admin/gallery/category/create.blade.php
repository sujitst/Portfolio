<form id="createCategoryForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.category_name') }}</label>
                    <input type="text" name="name" id="name" placeholder="{{ __('common.enter_category_name') }}">
                    <div class="nameError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.save') }}</button>
    </div>
</form>
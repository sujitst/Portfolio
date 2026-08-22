<form id="createBlogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.user_name') }}</label>
                    <select name="user_id" id="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="userNameError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.blog_title') }}</label>
                    <input type="text" name="title" id="title" placeholder="{{ __('common.enter_blog_title') }}">
                    <div class="titleError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.blog_description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="{{ __('common.text_here') }}"></textarea>
                    <div class="descriptionError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="input_form">
                    <label>{{ __('common.blog_image') }}</label>
                    <input type="file" name="image[]" id="image" multiple>
                    <span>{{ __('common.select_images') }}</span>
                    <div id="imagePreviewContainer" class="d-flex flex-wrap gap-2 mt-2"></div>
                    <div class="imageError text-danger errors d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.save') }}</button>
    </div>
</form>

<script>
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreviewContainer');

    let filesArray = [];

    imageInput.addEventListener('change', function () {
        const files = Array.from(this.files);
        files.forEach(file => filesArray.push(file));
        renderPreviews();
    });

    function renderPreviews() {
        previewContainer.innerHTML = '';

        filesArray.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                const wrapper = document.createElement('div');
                wrapper.className = 'image-preview-wrapper';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'image-preview';
                wrapper.appendChild(img);

                const closeBtn = document.createElement('span');
                closeBtn.className = 'image-remove-btn';
                closeBtn.innerHTML = '&times;';

                closeBtn.addEventListener('click', () => {
                    filesArray.splice(index, 1);
                    renderPreviews();
                });

                wrapper.appendChild(closeBtn);
                previewContainer.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        });

        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;
    }
</script>
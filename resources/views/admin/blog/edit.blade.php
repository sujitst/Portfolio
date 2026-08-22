<form id="updateBlogForm" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="custom_modal_body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.user_name') }}</label>
                    <select name="user_id" id="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $blog->user_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="userNameError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.blog_title') }}</label>
                    <input type="text" name="title" id="title" value="{{ $blog->title }}" placeholder="{{ __('common.enter_blog_title') }}">
                    <div class="titleError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="input_form">
                    <label>{{ __('common.blog_description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="10">{{ $blog->description }}</textarea>
                    <div class="descriptionError text-danger errors d-none"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="input_form">
                    <label>{{ __('common.blog_image') }}</label>
                    <input type="file" name="image[]" id="image" multiple>
                    <span>{{ __('common.select_images') }}</span>
                    <div class="mt-2" id="imagePreviewWrapper">
                        @if(!empty($blog->image))
                            @php $images = json_decode($blog->image, true); @endphp
                            @foreach($images as $img)
                            <div class="image-preview-wrapper" style="display:inline-block; position:relative; margin-right:10px;">
                                <img src="{{ asset('upload/blog/' . $img) }}" class="image-preview" style="max-width:150px;">
                                <span class="remove-existing-image" data-name="{{ $img }}" style="cursor:pointer; color:red; position:absolute; top:0; right:0;">&times;</span>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_modal_footer">
        <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
        <button type="submit" class="addAbout">{{ __('common.update') }}</button>
    </div>
</form>



<script>
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreviewWrapper'); 

    let filesArray = [];

    imageInput.addEventListener('change', function () {
        const files = Array.from(this.files);
        files.forEach(file => filesArray.push(file));
        renderPreviews();
    });

    function renderPreviews() {
        let existingHTML = '';
        document.querySelectorAll('.remove-existing-image').forEach(el => {
            existingHTML += el.parentElement.outerHTML;
        });

        previewContainer.innerHTML = existingHTML;

        filesArray.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                const wrapper = document.createElement('div');
                wrapper.className = 'image-preview-wrapper';
                wrapper.style = 'display:inline-block; position:relative; margin-right:10px;';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'image-preview';
                img.style.maxWidth = '150px';
                wrapper.appendChild(img);

                const closeBtn = document.createElement('span');
                closeBtn.className = 'image-remove-btn';
                closeBtn.innerHTML = '&times;';
                closeBtn.style = 'cursor:pointer; color:red; position:absolute; top:0; right:0;';
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

    document.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-existing-image')){
            e.target.parentElement.remove();

            const removedInput = document.createElement('input');
            removedInput.type = 'hidden';
            removedInput.name = 'removed_images[]';
            removedInput.value = e.target.dataset.name;
            document.getElementById('updateBlogForm').appendChild(removedInput);
        }
    });
</script>
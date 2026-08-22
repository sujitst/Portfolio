<div class="row">
    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
        @foreach ($mycontacts as $me)
            <div class="contact_card">
                <a href="#"><i class="{{ $me->icon }}" aria-hidden="true"></i></a>
                <div class="contact_text">
                    <h5>{{ $me->name }}</h5>
                    <p>{{ $me->info }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 col-md-12 col-lg-6 col-xl-6">
        <div class="contact_form">
            <h3>{{ __('common.contact_message') }}</h3>
            <form action="{{ route('user.message') }}" id="contactMessage" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="input_field">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('common.enter_name') }}">
                    <input type="text" id="mobile_code" name="number" value="{{ old('number') }}" placeholder="{{ __('common.enter_phone') }}">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('common.enter_email') }}">
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="{{ __('common.enter_address') }}">
                    <textarea name="description" value="{{ old('description') }}" placeholder="{{ __('common.text_here') }}"></textarea>
                </div>
                <button type="submit" id="submitBtn">{{ __('common.send_message') }}</button>
            </form>
            <div id="responseMessage"></div>

        </div>
    </div>
</div>




<script>
    document.getElementById('contactMessage').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);
        let submitBtn = document.getElementById('submitBtn');

        let originalBtnText = submitBtn.innerHTML;
        submitBtn.innerHTML = 'Sending...';
        submitBtn.disabled = true;
        submitBtn.classList.remove('btn-success', 'btn-error');

        form.querySelectorAll('input, textarea').forEach(field => {
            field.classList.remove('input-error');
        });

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
            },
            body: formData
        })
        .then(async response => {
            let data = await response.json();
            if (!response.ok) throw data;
            return data;
        })
        .then(data => {
            submitBtn.innerHTML = data.message;
            submitBtn.classList.add('btn-success');

            setTimeout(() => {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                submitBtn.classList.remove('btn-success');
                form.reset();
            }, 3000);
        })
        .catch(error => {
            if (error.errors) {
                Object.keys(error.errors).forEach(key => {
                    let field = form.querySelector(`[name="${key}"]`);
                    if (field) {
                        field.dataset.original = field.value;
                        field.value = error.errors[key][0];
                        field.classList.add('input-error');
                        setTimeout(() => {
                            field.value = field.dataset.original || '';
                            field.classList.remove('input-error');
                        }, 3000);
                    }
                });

                submitBtn.innerHTML = 'Please fix errors';
                submitBtn.classList.add('btn-error');
            } 
            else {
                submitBtn.innerHTML = 'Something went wrong';
                submitBtn.classList.add('btn-error');
            }
            setTimeout(() => {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                submitBtn.classList.remove('btn-error');
            }, 3000);
        });
    });
</script>
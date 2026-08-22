<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.person_image') }}</label>
                <img src="{{ asset('upload/testimonial/' . $testimonial->image) }}" alt="image" class="img_show_view">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.rating') }}</label>
                <div>
                    @php
                        $rating = $testimonial->rating;
                        $fullStars = floor($rating);
                        $decimal = $rating - $fullStars;

                        if ($decimal >= 0.75) {
                            $fullStars += 1;
                            $halfStar = false;
                        } elseif ($decimal >= 0.25) {
                            $halfStar = true;
                        } else {
                            $halfStar = false;
                        }

                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                    @endphp

                    {{-- Full Stars --}}
                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="fa fa-star text-warning"></i>
                    @endfor

                    {{-- Half Star --}}
                    @if ($halfStar)
                        <i class="fa fa-star-half-o text-warning"></i>
                    @endif

                    {{-- Empty Stars --}}
                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="fa fa-star-o text-warning"></i>
                    @endfor

                    <span class="ms-1 text-muted">({{ $rating }})</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.person_name') }}</label>
                <input type="text" value="{{ $testimonial->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.person_position') }}</label>
                <input type="text" value="{{ $testimonial->position }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.comment') }}</label>
                <textarea cols="30" rows="10" readonly>{{ $testimonial->comment }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>

<div class="custom_modal_body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label class="w-100 text-center">{{ __('common.images') }}</label>
                <img src="{{ asset('upload/project/' . $project->image) }}" class="img_show_view">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input_form">
                <label>{{ __('common.enter_rating') }}</label>
                <div>
                    @php
                        $rating = $project->rating;
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
                <label>{{ __('common.project_name') }}</label>
                <input type="text" value="{{ $project->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="input_form">
                <label>{{ __('common.price') }}</label>
                <input type="text" value="{{ $project->price }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="custom_modal_footer">
    <button type="button" class="bootbox-close-button">{{ __('common.cancel') }}</button>
</div>
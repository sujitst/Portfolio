<div class="layout_section_gallery" id="gallery">
    <div class="gallery_part">

        <!-- =====|| START:- GALLERY HEADING ||===== -->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.captured_moments') }}</h6>
                    <div class="gallery_info">
                        <h2>{{ __('common.gallery') }}</h2>
                        <p>{{ __('common.gallery_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- =====|| END:- GALLERY HEADING ||===== -->

        <!-- =====|| FILTER BUTTONS & GALLERY ||===== -->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about_gallery">

                    <!-- FILTER BUTTONS -->
                    <div class="filter-buttons">
                        <button class="active" data-filter="*">{{ __('common.all') }}</button>
                        @foreach($categories as $category)
                            @php $catClass = preg_replace('/[^A-Za-z0-9]/', '', strtolower($category->name)); @endphp
                            <button data-filter=".{{ $catClass }}">{{ $category->name }}</button>
                        @endforeach
                    </div>

                    <!-- GALLERY GRID -->
                    <div class="gallery">
                        @foreach($galleries as $item)
                            @php $categoryClass = preg_replace('/[^A-Za-z0-9]/', '', strtolower($item->category->name)); @endphp
                            <div class="gallery-item {{ $categoryClass }}" data-category="{{ $categoryClass }}">
                                @if($item->video)
                                    <a data-fancybox="gallery" data-type="video" href="{{ asset('upload/gallery/videos/' . $item->video) }}">
                                        <img src="{{ $item->image ? asset('upload/gallery/images/' . $item->image) : asset('assets/images/jpg/no-photo.jpg') }}" alt="{{ $item->category->name }}">
                                    </a>
                                @elseif($item->image)
                                    <a data-fancybox="gallery" href="{{ asset('upload/gallery/images/' . $item->image) }}">
                                        <img src="{{ asset('upload/gallery/images/' . $item->image) }}" alt="{{ $item->category->name }}">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- =====|| END:- FILTER BUTTONS & GALLERY ||===== -->

    </div>
</div>
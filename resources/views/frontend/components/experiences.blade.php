<div class="my_about">
    <div class="experience_line">
        @foreach ($experiences as $index => $exp)
            @php $isLeft = $index % 2 === 0; @endphp
            <div class="experience_item {{ $isLeft ? 'left' : 'right' }}">
                <div class="content">
                    <h4>{{ $exp->exp_name }}</h4>
                    <span>{{ $exp->exp_date_time }}</span>
                </div>
                <div class="icon">
                    @if($isLeft)
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
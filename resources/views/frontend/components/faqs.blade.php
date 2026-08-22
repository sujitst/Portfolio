@foreach ($faqs as $faq)
   <div class="faq_item">
        <button>
            <span>{{ $faq->question }}</span>
            <span class="icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
        </button>
        <p>{{ $faq->answer }}</p>
    </div> 
@endforeach
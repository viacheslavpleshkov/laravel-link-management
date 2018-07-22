@if(count($main)>0)
    <div class="div-container" id="fr">
        <h2 class="container-block-title">
            <i class="fas fa-graduation-cap "></i>{{ __('site.educations') }}</h2>
        @foreach($main as $item)
            <h4 class="container-degree">{{ $item->titleuk }}</h4>
            <h5 class="container-meta">{{ $item->textuk }}</h5>
            <div class="container-meta">{{ $item->timeuk }}</div>
            <br>
        @endforeach
    </div>
@endif
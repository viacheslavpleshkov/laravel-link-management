@if(count($main)>0)
    <div class="div-container">
        <h2 class="container-block-title">
            <i class="fas  fa-language"></i>{{ __('site.knowledge-of-languages') }}</h2>
        <ul>
            @foreach($main as $item)
                <li>{{ $item->languageuk }}<span class="container-meta"> ({{ $item->leveluk }})</span></li>
            @endforeach
        </ul>
    </div>
@endif
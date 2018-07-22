@if(count($main)>0)
    <div class="div-container link">
        <h2 class="container-block-title">
            <i class="fas  fa-link"></i>{{ __('site.contact-with-me') }}</h2>
        <ul>
            @foreach($main as $item)
                <li>
                    <i class="{{ $item->icon }}"></i>
                    <a href="{{ $item->url }}" target="_blank">{{ $item->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@extends('site.layouts.main')

@section('content')
    @if(count($main['aboutme'])>0)
        <section class="section summary-section">
            <h2 class="section-title">
                <i class="fas fa-user"></i>Обо мне</h2>
            <div class="summary">
                @foreach($main['aboutme'] as $item)
                    {!! $item->aboutmeru !!}
                @endforeach
            </div>
        </section>
    @endif
    @if(count($main['experiences'])>0)
        <section class="section summary-section">
            <h2 class="section-title">
                <i class="fas fa-building"></i>Опыты работы</h2>
            @foreach($main['experiences'] as $item)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{ $item->titleru }}</h3>
                            <div class="time">{{ $item->timeru }}</div>
                        </div>
                        <div class="company">{{ $item->companyru }}</div>
                    </div>
                    <div class="details">
                        <p>Cтек технологий: {{ $item->textru }}</p>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
    @if(count($main['skills'])>0)
        <section class="skills-section section">
            <h2 class="section-title">
                <i class="fas fa-list"></i>Навыки и умения</h2>
            <div class="skillset">
                @foreach($main['skills'] as $item)
                    <div class="item">
                        <h3 class="level-title">{{ $item->title }}</h3>
                        <div class="progress rounded-0">
                            <div class="progress-bar rounded-0" role="progressbar" style="width: {{ $item->level }}%"
                                 aria-valuenow="{{ $item->level }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    @if(strlen($main['projects'])>0)
        <section class="section summary-section">
            <h2 class="section-title">
                <i class="fas fa-briefcase"></i>Проекты</h2>
            <div class="summary">
                <div class="row">
                    @foreach($main['projects'] as $item)
                        <li class="col-lg-6 col-md-6 col-sm-6">
                            <a href="{{ $item->url }}" target="_blank">
                                <i class="fab fa-github" aria-hidden="true"></i>
                                {{ $item->title }}</a>
                        </li>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
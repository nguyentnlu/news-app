@extends('layouts.layout')
@section('content')
{{-- <div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-3 col-3 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('storage/'.$article->url) }}"
                        alt="{{ $article->url }}" />
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                        <a href="/category/{{ $article->category->slug }}" class="text-white"><i>{{
                                $article->category->name }}</i></a>
                        <div class=""><i class="fa fa-clock-o"></i>{{ $article->created_at }}</div>
                        <div class=""><a href="/article/{{ $article->slug }}" class="fh5co_good_font_2">{{
                                $article->title }}</a></div>
                        <br />
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}

{{-- Slider --}}
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($articles as $article)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $article->id }}" class="@if ($loop->first) active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($articles as $article)
        <div class="carousel-item @if ($loop->first) active @endif">
            <img class="d-block w-100" src="{{ asset('storage/'.$article->url) }}" alt="{{ $article->url }}">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $article->title }}</h5>
                <p>{{ $article->author->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

{{-- Latest news --}}
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Latest news</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            @foreach ($articles as $article)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="{{ asset('storage/'.$article->url) }}"
                            alt="{{ $article->url }}" class="fh5co_img_special_relative" /></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="/category/{{ $article->category->slug }}" class="text-white"><i>{{
                                $article->category->name }}</i></a>
                        <br />
                        <a href="/article/{{ $article->slug }}" class="text-white">{{ $article->title }}</a>
                        <div class="fh5co_latest_trading_date_and_name_color">{{ $article->created_at }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
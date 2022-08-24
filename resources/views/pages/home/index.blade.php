@extends('layouts.layout')
@section('content')
<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-3 col-3 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('storage/'.$article->url) }}"
                        alt="{{ $article->url }}" />
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                        <a href="/category/{{ $article->category->id }}" class="text-white"><i>{{
                                $article->category->name }}</i></a>
                        <div class=""><i class="fa fa-clock-o"></i>{{ $article->created_at }}</div>
                        <div class=""><a href="/article/{{ $article->id }}" class="fh5co_good_font_2">{{ $article->title }}</a></div>
                        <br />
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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
                        <a href="/category/{{ $article->category->id }}" class="text-white"><i>{{
                                $article->category->name }}</i></a>
                        <br />
                        <a href="/article/{{ $article->id }}" class="text-white">{{ $article->title }}</a>
                        <div class="fh5co_latest_trading_date_and_name_color">{{ $article->created_at }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
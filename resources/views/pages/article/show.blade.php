@extends('layouts.layout')
@section('content')
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <h5><i class="fa fa-list-alt" aria-hidden="true"></i><b>{{ $article->category->name }}</b></h5><br/>
        <h1>{{ $article->title }}</h1><br />
        <p><i>{{ $article->author->name }}</i></p>
        <p><i>{{ $article->created_at }}</i></p>
        <img src="{{ asset('storage/'.$article->url) }}" alt="{{ $article->url }}" width="1020px">
        <br /><br />
        <div class="row mx-0">
            <div class="col-md-8 animate-box content-detail" data-animate-effect="fadeInLeft">
                <br />
                {!!  $article->content  !!} 
            </div>
            <x-public.tag-box :items="$tags" />
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach ($articles as $article)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img">
                        <img src="{{ asset('storage/'.$article->url) }}" alt="{{ $article->url }}"/>
                    </div>
                    <div>
                        <a href="#" class="d-block fh5co_small_post_heading">
                            <span class="">{{ $article->title }}</span>
                        </a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> {{ $article->created_at }}</div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
@extends('layouts.layout')
@section('content')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $category->name ?? $tag->name }}
                    </div>
                </div>
                @foreach ($articles as $article)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <img src="{{ asset('storage/'.$article->url) }}"
                                    alt="{{ $article->url }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="/article/{{ $article->id }}" class="fh5co_magna py-2">{{ $article->title }}</a>
                        <div class="fh5co_consectetur">
                            {{ $article->author->name }}
                        </div>
                        <div class="fh5co_consectetur">
                            {{ $article->created_at }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if (isset($tags))
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    @foreach ($tags as $tag)
                    <a href="/tag/{{ $tag->id }}" class="fh5co_tagg">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
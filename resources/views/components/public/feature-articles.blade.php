<div class="container-fluid paddding">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" style="padding: 2px!important" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="{{ Storage::disk('s3')->url($getArticle()[0]->url) }}"
                    alt="{{ $getArticle()[0]->url }}" />
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div>
                        <p class="color_fff">
                            <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $getArticle()[0]->created_at }}
                        </p>
                    </div>
                    <div>
                        <a class="format-title fh5co_good_font" 
                            href="{{ route('public.article.show', $getArticle()[0]->slug) }}"
                            >
                            {{ $getArticle()[0]->title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @foreach ($getArticle() as $key=>$article )
                    @if($key != 0)
                        <div class="col-md-6 col-6 animate-box" style="padding: 2px!important" data-animate-effect="fadeIn">
                            <div class="fh5co_suceefh5co_height_2">
                                <img src="{{ Storage::disk('s3')->url($article->url) }}" alt="{{ $article->url }}" />
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div>
                                        <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $article->created_at }}
                                    </div>
                                    <div>
                                        <a class="format-title fh5co_good_font_2"
                                            href="{{ route('public.article.show', $article->slug) }}"
                                            >
                                            {{ $article->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
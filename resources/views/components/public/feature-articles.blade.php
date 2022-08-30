<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="{{ asset('storage/'.$getArticle()[0]->url) }}"
                    alt="{{ $getArticle()[0]->url }}" />
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Dec 31,2017
                        </a></div>
                    <div><a href="single.html" class="format-title fh5co_good_font">{{ $getArticle()[0]->title }}</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @foreach ($getArticle() as $key=>$article )
                @if($key != 0)
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="{{ asset('storage/'.$article->url) }}"
                            alt="{{ $article->url }}" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $article->created_at }}
                            </div>
                            <div>
                                <a href="{{ route('public.article.show', $article->slug) }}" class="format-title fh5co_good_font_2">{{ $article->title }}</a>
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
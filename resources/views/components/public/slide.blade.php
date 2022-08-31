<div class="container animate-box" data-animate-effect="fadeIn">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{ $key }}</div>
    </div>
    <div class="owl-carousel owl-theme js slider">
        @foreach ($items as $article)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img">
                        <img src="{{ asset('storage/'.$article->url) }}"
                            alt="{{ $article->url }}" class="fh5co_img_special_relative"/>
                    </div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="{{ route('public.category.index', $article->category->slug) }}" class="text-white">
                            <i>{{ $article->category->name }}</i>
                        </a>
                        <br/>
                        <a href="{{ route('public.article.show', $article->slug ) }}" class="text-white format-title">
                            {{ $article->title }}
                        </a>
                        <div class="fh5co_latest_trading_date_and_name_color">{{ $article->created_at }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
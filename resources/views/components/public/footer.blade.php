<div class="container animate-box">
    <div class="row d-flex justify-content-center">
        <div class="col-12 spdp_right py-5">
            <img src="{{ asset('frontend/images/white_logo.png') }}" alt="img" class="footer_logo"/>
        </div>
        <div class="clearfix"></div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="footer_main_title py-3"> About</div>
            <div class="footer_sub_about pb-3"> Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div class="footer_mediya_icon">
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle">
                            <i class="fa fa-linkedin"></i>
                        </div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle">
                            <i class="fa fa-google-plus"></i>
                        </div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle">
                            <i class="fa fa-twitter"></i>
                        </div>
                    </a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle">
                            <i class="fa fa-facebook"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-2">
            <div class="footer_main_title py-3">Category</div>
            <ul class="footer_menu">
                @foreach ($getMenu() as $menu)
                    <li>
                        <a href="{{ route('public.category.index', $menu) }}">
                            <i class="fa fa-angle-right"></i>&nbsp;&nbsp; {{ $menu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
            <div class="footer_main_title py-3"> Most Viewed Posts</div>
            <div class="footer_makes_sub_font"> Dec 31, 2016</div>
            <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
            <div class="footer_makes_sub_font"> Dec 31, 2016</div>
            <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
            <div class="footer_makes_sub_font"> Dec 31, 2016</div>
            <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
            <div class="footer_position_absolute"><img src="{{ asset('frontend/images/footer_sub_tipik.png') }}"
                    alt="img" class="width_footer_sub_img" /></div>
        </div>
    </div>
    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-12 col-md-8 col-lg-7 ">
            <div class="input-group">
                <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1">
                    <i class="fa fa-envelope"></i>
                </span>
                <input type="text" class="form-control fh5co_footer_text_box" placeholder="Enter your email..."
                    aria-describedby="basic-addon1">
                <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12">
                    <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe
                </a>
            </div>
        </div>
    </div>
</div>
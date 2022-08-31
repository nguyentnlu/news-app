<nav class="navbar navbar-toggleable-md navbar-light ">
    <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="img"
            class="mobile_logo_width"/>
    </a>
    <div class="collapse navbar-collapse row" id="navbarSupportedContent">
        <div class="col-sm-6">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" 
                        href="{{ route('public.home') }}"
                        >
                        Home 
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >
                        Category
                        <span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        @foreach ($getMenu() as $menu)
                            <a class="dropdown-item" 
                                href="{{ route('public.category.index', $menu) }}"
                                >
                                {{ $menu->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                        href="{{ route('public.tag') }}"
                        >
                        Tags
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" 
                        href="{{ route('public.contact') }}"
                        >
                        Contact
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <form action="{{ route('public.search') }}" class="input-group">
                <input type="search" name="search" value="{{ request()->query('search') }}" class="form-control"/>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
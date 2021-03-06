<header class="container-fluid bg-light shadow sticky-top py-1 w_100vw">
    <div class="row m-0 justify-content-between w-100 align-items-center">

        <ul class="d-flex menu_top align-items-center">

            <li class="logo_top animate__animated animate__flip"><a href="{{ route('index') }}"><img src="{{ asset('./assets/images/logo.png') }}" /></a></li>

            <li class="mx-3 cursor_pointer_text_shadow font_1_1"><a href="{{ route('index') }}">خانه</a><span></span></li>

            <li class="mx-3 cursor_pointer_text_shadow font_1_1">مقالات<span></span></li>

            <li class="mx-3 cursor_pointer_text_shadow font_1_1">درباره ما<span></span></li>


            @if (auth()->check())  {{-- چک کن که لاگین کرده یا نه --}}

            <li class="mx-3 cursor_pointer_text_shadow font_1_1">{{ auth()->user()->name }}<span></span></li>
            <li class="mx-3 cursor_pointer_text_shadow font_1_1"><a href="/logout" class="text-danger">خروج</a><span></span></li>

            {{--<form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">خروج</button>
            </form>--}}

            @else
                <li class="mx-3 cursor_pointer_text_shadow font_1_1"><a href="{{ route('register') }}">ثبت نام</a><span></span></li>

                <li class="mx-3 cursor_pointer_text_shadow font_1_1"><a href="{{ route('login') }}">ورود</a><span></span></li>
            @endif


            <li class="d-block d-md-none mx-4">
                <a href="/" class="fas fa-search fa-2x cursor_pointer_text_shadow "></a>
            </li>

        </ul>


        <div class="col-12 col-md-4 form-group search_box  d-none d-md-block">
            <input type="text" class="form-control rounded_5 placeholder_gray shadow-sm" placeholder="دنبال چی می گردی؟"/>
            <a href="/search.html" class="fas fa-search search_btn"></a>
        </div>
    </div>
</header>

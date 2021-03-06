
<main class="main container">

    <div class="row my-4">

        {{------------ content ------------}}
        <div id="articleRight" class="col-12 col-md-8 col-xl-9">
            <div class="p-2 bg-light rounded">
                <h1 class="text-center font_2 py-2">{{ $article->h_title }}</h1>
                <div class="image text-center">
                    <img src="{{ $article->image }}" alt="{{ $article->alt_image }}" class="img-fluid">
                </div>
                <div class="p-2 text_container">{!! $article->text !!}</div>
            </div>

        </div>


        {{------------ sidebar ------------}}
        <div id="articleLeft" class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
            <div class="row bg-light px1 py-5 text-center justify-content-center d-flex rounded w-100 m-auto">
                <div class="image rounded-circle overflow-hidden h_10 w_10 text-center justify-content-center">
                    <img class="max_w_100 m-auto" src="/assets/images/logo.png" alt="توضیح تصویر">
                </div>

                <div class="col-12 mt-3 justify-content-center">
                    <small class="text-center d-block">نویسنده:</small>
                    <h6 class="text-center">{{{ $article->user->name . " " . $article->user->lastname }}}</h6>

                    <small class="text-center d-block mt-3">تاریخ:</small>
                    <h6 class="text-center">{{ $article->created_at->diffForHumans() }}</h6> {{--diffForHumans()نمایش زمان به نوشته لاتین | config->app->local='fa'فارسی --}}

                    <div class="col-12 justify-content-center text-center mt-3">
                        <span class="text-center"> بازدید : {{$article->view_count}} </span>
                    </div>

                    <div class="col-12 justify-content-center text-center mt-3">
                        <a href="#" class="btn rounded_5 btn-outline-dark">دیگر مقالات </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{------------ comments ------------}}
    <div class="row justify-content-center align-items-center alert-secondary p-3">

        <div class="row p-3 justify-content-center text-right alert-light d-block mb-4 col-12">
            @foreach (explode("-" , $article->keywords) as $key)     {{-- explode("-" , $article->keywords) بیا جدا کن از طریق - دونه دونه کلمات کلیدی تبدیل کن به آزایهه --}}
                ( <a href="#">{{ $key }}</a> )
            @endforeach
        </div>


        @if (auth()->check())

            <div class="col-12 row justify-content-center form-group">
                <h5 class="col-12 text-center">متن نظر:</h5>
                <textarea name="comment_text" rows="10" class="form-control rounded shadow col-12 col-md-8" wire:model="comment_text"></textarea>
                @error('comment_text')
                <small class="d-block text-danger w-100 text-center">{{ $message }}</small>
                @enderror

                <div class="text-center col-12">
                    <button type="button" class="btn btn-success rounded_5 mt-3 pl-4 pr-4" wire:click="addComment">ثبت نظر</button>
                </div>
            </div>

        @else

            <p class="text-primary text-center"><a href="{{ route('login') }}">لطفا جهت ثبت نظر وارد شوید</a></p>

        @endif


        <div class="col-12 col-md-11 bg-white p-3">

            @forelse ($comments as $comment)  {{-- درون رندر فراخوانی کردیم بدون رفرش دیگه نمیخواد $article->comments --}}

                <div class="row my-2 d-block p-2 rounded shadow-sm border_1 col-11 m-auto shadow">
                    <div class="row justify-content-lg-between w-100 m-auto">
                        <h6 class="text-right text-success"> {{$comment->user->name}} | تاریخ : <span>{{ $comment->created_at->diffForHumans() }}</span> </h6>

                        @if ($comment->user_id === auth()->user()->id)    {{-- فقط پیام های خودم بتونم حذف کنم --}}
                        <span>
                            <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"></i>
                            {{--<i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>--}}
                        </span>
                        @endif

                    </div>

                    <div class=" w-100 pb-3">
                        <p class="text-justify">{{ $comment->text }}</p>
                        <button class="btn btn-primary rounded_5 px-3 ">پاسخ</button>
                    </div>


                     {{--  <div class="answer shadow-sm alert-success p-2">
                        <h6 class="text-right text-primary">پاسخ</h6>
                        <div class="row justify-content-lg-between w-100 m-auto">
                            <h6 class="text-right text-info">عباس در تاریخ 99/12/20</h6>
                            <span>
                      <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"></i>
                      <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>
                    </span>
                        </div>
                        <p >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi eveniet maiores distinctio ex maxime minus, deleniti nam in.
                            Voluptas nulla neque mollitia harum. Similique, corporis? Quae temporibus cupiditate quo quis!</p>
                    </div>  --}}
                 </div>

            @empty
                <p class="text-center text-danger">کامنتی درون این وبلاگ وجود ندارد</p>
            @endforelse

        </div>
    </div>

</main>

<header class="main-header default">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="logo-area default">
                    <a href="#">
                        <img src="{{asset('public/assets/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                <div class="search-area default">
                    <form action="" class="search">
                        <input type="text" id="gsearchsimple"
                               placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                        <ul class="list-group search-box-list">
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    گوشی موبایل
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    لپ تاپ
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    کفش
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    مانتو
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    لباس ورزشی
                                </a>
                            </li>
                        </ul>
                        <div class="localSearchSimple"></div>
                        <button type="submit"><img src="{{asset('public/assets/img/search.png')}}" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    @guest
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1">
                            ورود / ثبت نام
                        </a>
                    @endguest

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        @guest
                            <div class="dropdown-item">
                                <a href="{{route('login')}}" class="btn btn-info">ورود به تاپ کالا</a>
                            </div>
                            <div class="dropdown-item font-weight-bold">
                                <span>کاربر جدید هستید؟</span> <a href="{{route('register')}}" class="register">ثبت‌نام</a>
                            </div>
                            <hr>
                        @endguest
                        @auth
                            <div class="dropdown-item">
                                <a href="#" class="dropdown-item-link">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="#" class="dropdown-item-link">
                                    <i class="now-ui-icons shopping_bag-16"></i>
                                    پیگیری سفارش
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{route('logout')}}" class="dropdown-item-link">
                                    <i class="fa fa-sign-out"></i>
                                    خروج
                                </a>
                            </div>
                        @endauth
                    </ul>
                </div>
                <div class="cart dropdown">
                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
                        <img src="{{asset('public/assets/img/shopping-cart.png')}}" alt="">
                        سبد خرید
                        <span class="count-cart">2</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="basket-header">
                            <div class="basket-total">
                                <span>مبلغ کل خرید:</span>
                                <span> ۲۳,۵۰۰</span>
                                <span> تومان</span>
                            </div>
                            <a href="#" class="basket-link">
                                <span>مشاهده سبد خرید</span>
                                <div class="basket-arrow"></div>
                            </a>
                        </div>
                        <ul class="basket-list">
                            <li>
                                <a href="#" class="basket-item">
                                    <button class="basket-item-remove"></button>
                                    <div class="basket-item-content">
                                        <div class="basket-item-image">
                                            <img alt="" src="{{asset('public/assets/img/cart/2324935.jpg')}}">
                                        </div>
                                        <div class="basket-item-details">
                                            <div class="basket-item-title">هندزفری بلوتوث مدل S530
                                            </div>
                                            <div class="basket-item-params">
                                                <div class="basket-item-props">
                                                    <span> ۱ عدد</span>
                                                    <span>رنگ مشکی</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="basket-submit">ورود و ثبت سفارش</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            <ul class="list float-right">
                @foreach(\App\Category::query()->where('parent_id','=',0)->get() as $category)
                   @if(empty($category->childs))
                        <li class="list-item">
                            <a class="nav-link" href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}">{{$category->name}}</a>
                        </li>
                       @else
                        <li class="list-item list-item-has-children mega-menu mega-menu-col-5" >
                            <a class="nav-link" href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}">{{$category->name}}</a>
                            <ul class="sub-menu nav">
                                @include('layouts.category_childs',['childs'=>$category->childs->all()])
                                <img src="{{asset('public/assets/img/1636.png')}}" alt="">
                            </ul>
                        </li>
                   @endif

                @endforeach
                <li class="list-item amazing-item">
                    <a class="nav-link" href="#" target="_blank">شگفت‌انگیزها</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="overlay-search-box"></div>
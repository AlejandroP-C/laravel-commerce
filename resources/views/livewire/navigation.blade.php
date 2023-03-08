<div>

    <div class="humberger__menu__overlay"></div>

    {{-- Mobile --}}
    <div class="humberger__menu__wrapper">

        <div class="humberger__menu__logo">
            <a href="/" class="logo">V-Shop</a>
        </div>

        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>

        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"> Login</a>
                <a href="#"> Register</a>
            </div>

        </div>

        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                {{-- <li><a href="#">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="#">Shoping Cart</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="#">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact</a></li> --}}
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> therichposts@gmail.com</li>
            </ul>
        </div>
    </div>

    {{-- Desktop --}}
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> therichposts@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                <a href="#"> Login</a>
                                <a href="#"> Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/" class="logo">V-Shop</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            {{-- <li><a href="#">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li>
                                    <li><a href="#">Shoping Cart</a></li>
                                    <li><a href="#">Check Out</a></li>
                                    <li><a href="#">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>

    </header>

</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Categorías</span>
                    </div>
                    <ul style="display: none">
                        @foreach ($categories as $category)
                            <li><a href="{{route('commerces.category', $category)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 ml-">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">Buscar por nombre</div>
                            <input type="text" />
                            <button type="submit" class="site-btn">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

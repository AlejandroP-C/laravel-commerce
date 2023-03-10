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
            <ul></ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

    </div>

    {{-- Desktop --}}
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @if (isset(auth()->user()->email))
                            <div class="header__top__left">
                                <ul>
                                    <li><i class="fa fa-envelope"></i>{{ auth()->user()->email }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right" style="float: right">
                            @auth
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                                    <!-- Profile dropdown -->
                                    <div class="relative ml-3" x-data="{ open: false }">

                                        <div>
                                            <button x-on:click="open = true" type="button"
                                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="h-8 w-8 rounded-full"
                                                    src="{{ auth()->user()->profile_photo_url }}" alt="">
                                            </button>
                                        </div>

                                        <div x-show="open" x-on:click.away="open = false"
                                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                            tabindex="-1">

                                            <a href="{{ route('profile.show') }}"
                                                class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                                id="user-menu-item-0">Tu perfil</a>

                                                @can('admin.home')
                                                <a href="/admin"
                                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                                    id="user-menu-item-0">Commerce Management</a>
                                                  @endcan


                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="{{ route('logout') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                                    tabindex="-1" id="user-menu-item-2"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">Cerrar
                                                    sesión</a>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="header__top__right__auth">
                                    <a href="{{ route('login') }}"> Login</a>
                                    <a href="/register"> Register</a>
                                </div>
                            @endauth

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
                        <ul></ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    {{-- <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div> --}}
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
                <div class="form">
                    <ul style="display: none">
                        @foreach ($categories as $category)
                            <li><a href="{{route('commerces.category', $category)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">

            </div>
        </div>
    </div>
</section>

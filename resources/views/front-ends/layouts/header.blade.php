<header id="header-container">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo fronts/images/logo.png -->
                <div id="logo">
                    <a href="{{ route('home_story') }}"><img src="{{ asset('images/logov2.gif') }}" alt=""></a>
                </div>

                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>

                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">

                        <li><a class="current" href="#">{{ __('header.menu.lists') }}</a>
                            @if (!empty(__('list_menu.lists')))
                                <ul>
                                    @foreach (__('list_menu.lists') as $keyMenuList => $menuList)
                                        <li><a
                                                href="{{ route('search_stories', ['menus[]' => $keyMenuList]) }}">{{ $menuList }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>

                        <li><a href="#">{{ __('header.menu.category') }}</a>
                            @if (isset($menuCategories))
                                <div class="mega-menu mobile-styles three-columns">

                                    @php
                                        $countCateCol = $menuCategories->count() / 3;
                                    @endphp

                                    <div class="mega-menu-section">
                                        <ul>
                                            {{-- <li class="mega-menu-headline">Pages #1</li> --}}
                                            @foreach ($menuCategories as $key => $menuCategory)
                                                @if ($key < $countCateCol && $key >= 0)
                                                    <li><a
                                                            href="{{ route('search_stories', ['categories[]' => $menuCategory->id]) }}">
                                                            {{-- <i class="sl sl-icon-user"></i>  --}}
                                                            {{ $menuCategory->name }}
                                                        </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="mega-menu-section">
                                        <ul>
                                            {{-- <li class="mega-menu-headline">Pages #2</li> --}}
                                            @foreach ($menuCategories as $key => $menuCategory)
                                                @if ($key < $countCateCol * 2 && $key >= $countCateCol)
                                                    <li><a
                                                            href="{{ route('search_stories', ['categories[]' => $menuCategory->id]) }}">
                                                            {{-- <i class="sl sl-icon-user"></i>  --}}
                                                            {{ $menuCategory->name }}
                                                        </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="mega-menu-section">
                                        <ul>
                                            {{-- <li class="mega-menu-headline">Pages #3</li> --}}
                                            @foreach ($menuCategories as $key => $menuCategory)
                                                @if ($key < $countCateCol * 3 && $key >= $countCateCol * 2)
                                                    <li><a
                                                            href="{{ route('search_stories', ['categories[]' => $menuCategory->id]) }}">
                                                            {{-- <i class="sl sl-icon-user"></i>  --}}
                                                            {{ $menuCategory->name }}
                                                        </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            @endif
                        </li>

                        {{-- <li><a href="#">Listings</a>
                            <ul>
                                <li><a href="#">List Layout</a>
                                    <ul>
                                        <li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
                                        <li><a href="listings-list-full-width.html">Full Width</a></li>
                                        <li><a href="listings-list-full-width-with-map.html">Full Width + Map</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Grid Layout</a>
                                    <ul>
                                        <li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
                                        <li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
                                        <li><a href="listings-grid-full-width.html">Full Width</a></li>
                                        <li><a href="listings-grid-full-width-with-map.html">Full Width + Map</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Half Screen Map</a>
                                    <ul>
                                        <li><a href="listings-half-screen-map-list.html">List Layout</a></li>
                                        <li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
                                        <li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Single Listings</a>
                                    <ul>
                                        <li><a href="listings-single-page.html">Single Listing 1</a></li>
                                        <li><a href="listings-single-page-2.html">Single Listing 2</a></li>
                                        <li><a href="listings-single-page-3.html">Single Listing 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Open Street Map</a>
                                    <ul>
                                        <li><a href="listings-half-screen-map-list-OpenStreetMap.html">Half Screen Map
                                                List Layout</a></li>
                                        <li><a href="listings-half-screen-map-grid-1-OpenStreetMap.html">Half Screen Map
                                                Grid Layout 1</a></li>
                                        <li><a href="listings-half-screen-map-grid-2-OpenStreetMap.html">Half Screen Map
                                                Grid Layout 2</a></li>
                                        <li><a href="listings-list-full-width-with-map-OpenStreetMap.html">Full Width
                                                List</a></li>
                                        <li><a href="listings-grid-full-width-with-map-OpenStreetMap.html">Full Width
                                                Grid</a></li>
                                        <li><a href="listings-single-page-OpenStreetMap.html">Single Listing</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}

                        {{-- <li><a href="#">User Panel</a>
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="dashboard-messages.html">Messages</a></li>
                                <li><a href="dashboard-bookings.html">Bookings</a></li>
                                <li><a href="dashboard-wallet.html">Wallet</a></li>
                                <li><a href="dashboard-my-listings.html">My Listings</a></li>
                                <li><a href="dashboard-reviews.html">Reviews</a></li>
                                <li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
                                <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                <li><a href="dashboard-my-profile.html">My Profile</a></li>
                                <li><a href="dashboard-invoice.html">Invoice</a></li>
                            </ul>
                        </li> --}}

                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->


            <!-- Right Side Content / End -->
            <div class="right-side">
                <div class="header-widget">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="sign-in"><i class="sl sl-icon-login"></i>
                                {{ __('auth.login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="sign-in"><i class="sl sl-icon-plus"></i>
                                {{ __('auth.register') }}</a>
                        @endif
                    @else

                        <!-- User Menu -->
                        <div class="user-menu">
                            <div class="user-name"><span><img
                                        src="{{ asset('fronts/images/dashboard-avatar.jpg') }}" alt=""></span>Hi,
                                {{ Auth::user()->name }}</div>
                            <ul>
                                <li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages</a>
                                </li>
                                <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><i class="sl sl-icon-power"></i>
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest

                    <a href="#" class="button border with-icon">{{ __('public.add_story') }} <i
                            class="sl sl-icon-plus"></i></a>
                </div>
            </div>
            <!-- Right Side Content / End -->

            <!-- Sign In Popup -->
            <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                <div class="small-dialog-header">
                    <h3>Sign In</h3>
                </div>

                <!--Tabs -->
                <div class="sign-in-form style-1">

                    <ul class="tabs-nav">
                        <li class=""><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form method="post" class="login">

                                <p class="form-row form-row-wide">
                                    <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username"
                                            value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password" />
                                    </label>
                                    <span class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </span>
                                </p>

                                <div class="form-row">
                                    <input type="submit" class="button border margin-top-5" name="login"
                                        value="Login" />
                                    <div class="checkboxes margin-top-10">
                                        <input id="remember-me" type="checkbox" name="check">
                                        <label for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form method="post" class="register">

                                <p class="form-row form-row-wide">
                                    <label for="username2">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username2"
                                            value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="email2">Email Address:
                                        <i class="im im-icon-Mail"></i>
                                        <input type="text" class="input-text" name="email" id="email2" value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password1">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password1" id="password1" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password2">Repeat Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password2" id="password2" />
                                    </label>
                                </p>

                                <input type="submit" class="button border fw margin-top-10" name="register"
                                    value="Register" />

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Sign In Popup / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>

<div class="main_header">
    <div class="container">
        <!--header middel start-->
        <div class="header_middle sticky-header">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('img/logo/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="main_menu menu_position text-center">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{route('route_FrontEnd_home')}}">Home</a></li>

                                <li><a  href="">Category <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        @foreach($objUser as $c)
                                            <li><a href="{{route('route_BackEnd_category',['id'=>$c->id])}}">{{$c ->name}} </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="contact.html"> Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-6">
                    <div class="header_configure_area">

                        <div class="mini_cart_wrapper">
                            <a href="{{route('cart.list')}}" >
                                <i class="fa fa-shopping-bag"></i>
                                <span class="cart_price"> <?php $num = number_format(Cart::getTotal(), 0, ',', '.') ?>{{$num.' VND'}}<i class="ion-ios-arrow-down"></i></span>
                                <span class="cart_count">  {{ Cart::getTotalQuantity()}}</span>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        <!--mini cart-->

        <!--mini cart end-->

        <!--header bottom satrt-->
        <div class="header_bottom">
            <div class="row align-items-center">
                <div class="column1 col-lg-3 col-md-6">
                    <div class="categories_menu">
                        <div class="categories_title active">
                            <h2 class="categori_toggle">ALL CATEGORIES</h2>
                        </div>
                        <div class="categories_menu_toggle">
                            <ul>
                                @foreach($objUser as $c)
                                <li><a href="{{route('route_BackEnd_category',['id'=>$c->id])}}">{{$c ->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="column2 col-lg-6 ">
                    <div class="search_container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Search..." type="text">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="column3 col-lg-3 col-md-6">
                    <div class="header_bigsale">
                        <a href="#">BIG SALE </a>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div>
</div>

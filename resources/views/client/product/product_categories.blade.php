@extends('templates.home')
@section('content')
    <!--header area end-->

    <!--slider area start-->
    @include('templates.slider')
    <!--slider area end-->
    <div class="container">
    <div class="product_area">
        <div class="row">
            <div class="col-12">
                <div class="product_header row">
                    <div class="section_title col-xl-auto col-12">
                        <h2>Danh Mục {{$objItem->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                @foreach($list as $l)
                    <article class="single_product">
                        <figure>

                            <div class="product_thumb">
                                <a class="primary_img"  href="{{route('route_BackEnd_home_detail',['id'=>$l->id])}}"><img width="262.2px" height="262.2px" src="{{ $l->main_image?''.Storage::url($l->main_image):'http://placehold.it/100x100' }}" alt=""></a>
{{--                                <div class="action_links">--}}
{{--                                    <ul>--}}
{{--                                        <li class="wishlist"><a href="wishlist.html" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>--}}
{{--                                        <li class="compare"><a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>--}}
{{--                                        <li class="quick_button"><a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box" data-tippy="quick view"><i class="ion-ios-search-strong"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>

                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name"><a href="{{route('route_BackEnd_home_detail',['id'=>$l->id])}}">{{$l->name}}</a></h4>
                                    <div class="price_box">
                                        <span class="current_price"><?php $num = number_format($l->price, 0, ',', '.') ?>{{$num.' VND'}}</span>
{{--                                        <span class="old_price">$79.00</span>--}}
                                    </div>
                                </div>
                                <div class="add_to_cart" >
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $l->id }}" name="id">
                                        <input type="hidden" value="{{ $l->name }}" name="name">
                                        <input type="hidden" value="{{ $l->price }}" name="price">
                                        <input type="hidden" value="{{ $l->main_image}}"  name="main_image">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="px-4 py-2 text-white btn-danger rounded">Add To Cart</button>
                                    </form>
                                </div>

                            </div>
                        </figure>
                    </article>
                @endforeach
            </div>

        </div>
        <div class="text-center" style="margin-left: 660px">
            {{$list->appends($extParams)->links()}}
        </div>
    </div>
    </div>


@endsection

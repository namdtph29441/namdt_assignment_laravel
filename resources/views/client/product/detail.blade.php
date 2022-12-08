@extends('templates.home')
@section('content')
    <div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <!--product details start-->
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" src="{{ $objItem->main_image?''.Storage::url($objItem->main_image):'http://placehold.it/100x100' }}" >
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form  action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">

                                    <h3><a href="#">{{$objItem->name}}</a></h3>

                                    <div class="price_box">
{{--                                        <span class="old_price">$80.00</span>--}}
                                        <span class="current_price">{{$objItem->price}}  VNĐ</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>{{$objItem->detail}} </p>
                                    </div>
                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="100" value="1" type="number">

                                            @csrf
                                            <input type="hidden" value="{{ $objItem->id }}" name="id">
                                            <input type="hidden" value="{{ $objItem->name }}" name="name">
                                            <input type="hidden" value="{{ $objItem->price }}" name="price">
                                            <input type="hidden" value="{{ $objItem->main_image}}"  name="main_image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="px-4 py-2 text-white btn-danger rounded">Add To Cart</button>

{{--                                        <button class="button" type="submit">add to cart</button>--}}

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product details end-->

                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Description</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                            <p>{{$objItem->detail}}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product info end-->
            </div>


        </div>
    </div>
@endsection

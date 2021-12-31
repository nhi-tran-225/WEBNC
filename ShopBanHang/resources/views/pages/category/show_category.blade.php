@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach($category_name as $name)
    <h2 class="title text-center">{{$name->category_name}}</h2>
    @endforeach
    @foreach($category_by_id as $by_id)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$by_id->product_id)}}">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/upload/product/'.$by_id->product_image)}}" alt="" />
                    <h2>{{number_format($by_id -> product_price,0,',','.').' '.'VNĐ'}}</h2>
                    <p>{{$by_id->product_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
</a>
    @endforeach
</div><!--features_items-->
@endsection
                    
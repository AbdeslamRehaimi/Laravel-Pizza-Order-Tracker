@extends('layout.layout')
@section('content')
<div class="shop-page-area bg-white ">
    <div class="banner-area text-center bg-dark">
        <div class="imgbanner imgbanner-2">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal">Punny headline</h1>
                <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
                <a class="btn btn-outline-secondary" href="#">BOITE Pizza</a>
            </div>
        </div>
    </div>
    <div class="container">
<br>
        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

        <div class="shop-page-products mt-30">
            <div class="row no-gutters">

                @foreach ($formules as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <!-- Single Product -->
                    <article class="hoproduct">
                        <div class="hoproduct-image">
                            <a class="hoproduct-thumb" href="{{ route('formules.show', $item->nomFormule ) }}">
                                    <img class="hoproduct-frontimage" src="{{ $item->imgPath }}" alt="Formule image">
                                </a>
                            <ul class="hoproduct-flags">
                                <li class="flag-pack">New </li>
                            </ul>
                        </div>
                        <div class="hoproduct-content">
                            <h5 class="hoproduct-title"><a href="{{ route('formules.show', $item->nomFormule ) }}">{{ $item->nomFormule }}</a></h5>
                            <div class="hoproduct-rattingbox">
                                <div class="rattingbox">
                                    <span class="active"><i class="fa fa-star"></i></span>
                                    <span class="active"><i class="fa fa-star"></i></span>
                                    <span class="active"><i class="fa fa-star"></i></span>
                                    <span class="active"><i class="fa fa-star"></i></span>
                                    <span class="active"><i class="fa fa-star"></i></span>
                                </div>
                            </div>
                            <div class="hoproduct-pricebox">
                                <div class="pricebox">
                                     <span class="price">{{ getPrice($item->prix)  }}</span>
                                </div>
                            </div>
                            <a href="{{ route('formules.show', $item->nomFormule ) }}" class="stretched-link btn btn-info" style="text-align: center; color:aliceblue">Voir formule</a>
                            <!--<p style=" text-align: justify; font-family: cursive; font: -webkit-xxx-large; ">Canon's first 4K UHD Camcorder, the GX10 has a compact and portable design that delivers outstanding video quality with remarkable detail. With a combination of incredible features and functionality, the GX10.</p>
                                -->
                        </div>
                    </article>
                    <!--// Single Product -->
                </div>
                @endforeach
            </div>
        </div>

<!--
        <div class="cr-pagination pt-30">

        </div>
-->
    </div>
</div>
@endsection

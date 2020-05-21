@extends('layout.layout') @section('content')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('res/more.css') }}">
@endsection
<div class="container-fluid header-title " >
    <div class="container">
        <h1  style="color:white;"><a href="{{route('formules.index')}}" class="fa fa-angle-double-left"><span></span></a><center> Votre formule</center></h1>
    </div>
</div>
<div class="container" style="margin-top: 50px;margin-bottom: 50px;">

    <div class="products">
        <div class="detail-product">
            <!-- ITEM FORMULE| START -->
            <div class="item item-formule" id="formule">
                <input type="hidden" id="slug-formule" value="duo-max">

                <h1 class="h1-product">{{ $formule->nomFormule }}</h1>

                <div class="item-long-desc">
                    <p><strong>N&nbsp;pizzas grandes</strong>&nbsp;au choix</p>

                    <ul>
                        <li><strong>N boisson</strong> N.25 L</li>
                        <li><strong>N € le dessert ou Ti’Salade</strong></li>
                        <li><strong>N Chicken Wings</strong></li>
                    </ul>
                </div>
            </div>

            <div class="item item-img">
                <div class="img">
                    <a href="https://www.tutti-pizza.com/fr/produit/duo-max.php">
                        <img src="{{ $formule->imgPath }}" alt="Duo Max" class="img-fluid" style="display: inline;">
                    </a>
                    <noscript>
                        <img src="{{ $formule->imgPath }}" alt="Duo Max" class="img-fluid">
                    </noscript>
                </div>
            </div>

            <div class="item item-base-detail">
                <br>
                <div class="item-variantes btn btn-danger">
                    <span class="price">{{ getPrice($formule->prix)  }}</span>
                </div>
                <br>
                <button style="display: flex;" type="submit" class="ho-button">
                                        <i class="fa fa-edit"></i>
                                        <span>Personaliser</span>
                                    </button>

            </div>
            <!-- ITEM FORMULE | END -->
        </div>
    </div>

</div>
@endsection

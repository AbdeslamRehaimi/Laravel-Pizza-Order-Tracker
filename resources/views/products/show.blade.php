@extends('layout.layout')
@section('content')

<main class="page-content">

    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">

            <div class="pdetails">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pdetails-images">
                            <div class="">
                                <div class="pdetails-singleimage" style="text-align: center;width: 100%;display: inline-block;">
                                    <img src="{{ $product->imgPath }}" alt="product image" style=" width: 450px; height: 350px; ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pdetails-content">

                            <div class="rattingbox">
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                            </div>
                            <h3>{{ $product->Nom }}</h3>
                            <div class="pdetails-pricebox">
                                <del class="oldprice">${{ $product->Prix }}</del>
                                <span class="price">${{ $product->Prix - ($product->Prix * $product->Remise/100) }}</span>
                                <span class="badge">Save {{ $product->Remise }}%</span>
                            </div>
                            <br><br><br>
                            <div class="pdetails-quantity" style="display: flex;">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button style="display: flex;" type="submit" class="ho-button">
                                        <i class="fa fa-cart-plus"></i>
                                        <span>Add to cart</span>
                                    </button>
                                </form>
                            </div>
                            <div class="pdetails-categories">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="shop-rightsidebar.html">{{ $product->categories->NomCategorie }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pdetails-allinfo">

                <ul class="nav pdetails-allinfotab justify-content-center" id="product-details" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link" id="product-details-area3-tab" data-toggle="tab" href="#product-details-area3" role="tab" aria-controls="product-details-area3" aria-selected="false">Reviews (1)</a>
                    </li>
                </ul>

                <div class="tab-content" id="product-details-ontent">

                    <div class="tab-pane fade active" id="product-details-area3" role="tabpanel" aria-labelledby="product-details-area3-tab">
                        <div class="pdetails-reviews">
                            <div class="product-review">



                                <div class="commentlist">
                                    <h5>ALL COMMENTS BY CLIENTS FOR THIS PRODUCT</h5>
                                    @foreach( $product->commentaires as $item)
                                    <div class="single-comment">
                                        <div class="single-comment-thumb">
                                            <img src="{{$item->clients->imgPath}}" alt="hastech logo">
                                        </div>
                                        <div class="single-comment-content" style="width: -webkit-fill-available;">
                                            <div class="single-comment-content-top">
                                                <h6>{{$item->clients->nom}} {{$item->clients->prenom}} : publie le: {{$item->date_pub}}</h6>
                                                <div class="rattingbox">
                                                    <span class="active"><i class="fa fa-star"></i></span>
                                                    <span class="active"><i class="fa fa-star"></i></span>
                                                    <span class="active"><i class="fa fa-star"></i></span>
                                                    <span class="active"><i class="fa fa-star"></i></span>
                                                    <span class="active"><i class="fa fa-star"></i></span>
                                                </div>
                                            </div>
                                            <p>{{$item->texte}}.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>



                                <div class="commentbox mt-5">
                                    <h5>REVIEW/COMMENTS</h5>
                                    <form action="#" class="ho-form">
                                        <div class="ho-form-inner">
                                            <div class="single-input">
                                                <!--
                                                <label>Your Rating</label>
                                                <div class="rattingbox hover-action">
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span><i class="ion ion-ios-star"></i></span>
                                                    <span><i class="ion ion-ios-star"></i></span>
                                                </div>-->
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-textbox">Your Review</label>
                                                <textarea id="new-review-textbox" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-name">Name*</label>
                                                <input class="input form-control" disabled="true" type="text" value="Name Prename" id="new-review-name">
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-email">Email*</label>
                                                <input class="input form-control" disabled="true" type="email" value="email@email.com" id="new-review-email">
                                            </div>
                                            <div class="single-input">
                                                <button class="ho-button" type="submit"><span>SUBMIT</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--// Product Details Area -->

    <!--// Newsletter Area -->

</main>
@endsection

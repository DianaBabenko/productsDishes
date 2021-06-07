@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div mx-auto" style="width: 40%;">
                        <h3 class="mt-2">Product: {{$product->name}}</h3>
                    </div>
                    <a class="radius-div main-div col-1 ml-2 btn btn-outline-lavand" href="{{route('products.categories.index')}}"><- Back</a>

                    <form method="POST" action="{{ route('products.update', $product->id)}}">

                        @csrf

                        <div class="card-body row main-div radius-div my-2 justify-content-center mx-2" style="width: 100%">
                            <div class="row ml-3 mb-3">
                                @if ($product->status ===\App\Models\Product::STATUS_AVAILABLE)
                                    <div class=" mt-1">
                                        <input class="ml-1 mt-1" type="checkbox" name="status" value="{{\App\Models\Product::STATUS_FORBIDDEN}}"/>
                                        <span>Is it danger for you?</span>
                                    </div>
                                @endif
                                @if ($product->status === \App\Models\Product::STATUS_ACTIVE)
                                    <div class=" mt-1">
                                        <input class="ml-1 mt-1" type="checkbox" name="status" value="{{\App\Models\Product::STATUS_FORBIDDEN}}"/>
                                        <span>Is it danger for you?</span><span class="mx-3">or</span>
                                    </div>
                                    <div class="">
                                        <span class="mr-1">Select the expiration date of this product:</span>
                                        <input class="mt-1" type="date" name="expirationDate" value="{{ $product->expirationDate->format('Y-m-d') }}"/>
                                    </div>
                                @endif

                                @if ($product->status === \App\Models\Product::STATUS_FORBIDDEN)
                                    <span class="bg-danger mr-4">
                                       <h4>This product is danger for you</h4>
                                    </span>
                                    <div>
                                        <input class="mt-1 mr-1" type="checkbox" name="status" value="{{\App\Models\Product::STATUS_AVAILABLE}}"/>
                                        Make it available for you:
                                    </div>
                                    @endif
                            </div>

                            <div class="row col-12 justify-content-center">
                                <button type="submit" class="btn btn-outline-lavand">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

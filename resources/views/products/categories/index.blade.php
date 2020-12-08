@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div mx-auto" style="width: 40%;">
                        <h3 class="mt-2">Products</h3>
                    </div>
                    <form method="POST" action="{{ route('products.categories.save') }}">
                        @csrf

                        <div class="card-body row main-div  justify-content-center radius-div my-2 mx-2" style="width: 100%">
                            @foreach($categories as $count => $category)
                                @php /** @var \App\Models\ProductCategory $category  */ @endphp
                                <div class="col-5 mx-3 py-3 px-2 main-div radius-div mb-3">
                                    <div class="row col-12 ml-1">
                                        <h4>
                                            {{$category->name}}
                                        </h4>
                                    </div>
                                    @foreach($products as $count => $product)
                                        @php /** @var \App\Models\Product $product  */ @endphp
                                        @if ($product->category_id === $category->id)
                                            <div class="row ml-3">
                                                <div class="">
                                                    @if ($product->status !== \App\Models\Product::$STATUS_FORBIDDEN)
                                                    <input class="mt-1" type="checkbox" name="product[]" @if ($product->status === \App\Models\Product::$STATUS_ACTIVE) checked @endif value="{{$product->id}}"/>
                                                    @endif
                                                        <span class="ml-1">{{$product->name}}</span>

                                                        <a class="badge badge-pill py-2 badge-primary" href="{{route('products.edit', $product->id)}}">edit</a>
                                                </div>

{{--                                                @if (($product->status === \App\Models\Product::$STATUS_ACTIVE) || ($product->status ===\App\Models\Product::$STATUS_AVAILABLE))--}}
{{--                                                    <div class="col-6">--}}
{{--                                                        <input class="ml-1 mt-1" type="checkbox" name="dangerProduct[]" value="{{$product->id}}"/>--}}
{{--                                                        <span>Is it danger for you?</span>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}

                                                @if ($product->status === \App\Models\Product::$STATUS_FORBIDDEN)
                                                    <span class="badge badge-pill ml-1 py-2 badge-danger">Danger for you</span>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div mx-auto">
                        <h3 class="mt-2">Recipe: {{$recipe->name}}</h3>
                    </div>
                    <a
                        class="radius-div main-div col-1 ml-2 btn btn-outline-lavand"
                        href="{{route('recipes.subcategory.index', $id)}}"
                    >
                        <- Back
                    </a>

                    <div class="card-body main-div radius-div my-2 mx-2" style="width: 100%">
                        @php /** @var \App\Models\Recipe $recipe  */ @endphp
                        <div class="row mx-3 py-3 px-2 main-div justify-content-between radius-div mb-4">
                            <div class="row ml-2 col-8 mr-2">
                                {{$recipe->description}}
                            </div>
                            @if (count($recipe->productIngredients) > 0 )
                                <div class="card-body main-div radius-div col-3 my-2 mx-2">
                                <div class="row ml-3" style="width: 100%;"><h4>Ingredients:</h4></div>
                                    <div class="row">
                                        <ul>
                                            @foreach($recipe->productIngredients as $product)
                                                <li>{{$product->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                            <div class="row col-12 justify-content-end">
                                <div class="row">
                                    <div class="row">
                                        <span class="mr-3">Number of servings: {{$recipe->personCount}}</span>
                                        <span class="mr-2">Time to cook: {{$recipe->cookTime}} minutes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

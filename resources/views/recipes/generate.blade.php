@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div mx-auto" style="width: 40%;">
                        <h3 class="mt-2">Generated Recipes</h3>
                    </div>
                    <a class="radius-div main-div col-1 ml-2 btn btn-outline-lavand" href="{{route('recipes.index')}}"><- Back</a>

                    <div class="card-body main-div radius-div my-2 mx-2" style="width: 100%">
                        @foreach($recipes as $count => $recipe)
                            @php /** @var \App\Models\Recipe $recipe  */ @endphp
                            <div class="row mx-3 py-3 px-2 main-div radius-div mb-3">
                                <div class="row col-12 ml-1">
                                    <h4>
                                        <a href="{{ route('recipes.subcategory.show', [$recipe->subcategory_id, $recipe->id]) }}">{{$recipe->name}}</a>
                                    </h4>
                                </div>
                                <div class="row ml-2">
                                    {{$recipe->description}}
                                </div>
                                <div class="row col-12 justify-content-end">
                                    <div class="row">
                                        <div class="row">
                                            <span class="mr-3">Number of servings: {{$recipe->personCount}}</span>
                                            <span class="mr-3">Time to cook: {{$recipe->cookTime}} minutes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

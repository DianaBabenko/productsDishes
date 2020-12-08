@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div mx-auto" style="width: 40%;">
                        <h3 class="mt-2">Recipes Categories</h3>
                    </div>

                    <div class="card-body row main-div  justify-content-center radius-div my-2 mx-2" style="width: 100%">
                        @foreach($categories as $count => $category)
                            @php /** @var \App\Models\RecipeCategory $category  */ @endphp
                            <div class="col-5 mx-3 py-3 px-2 main-div radius-div mb-3">
                                <div class="row col-12 ml-1">
                                    <h4>
                                        {{$category->name}}
                                    </h4>
                                </div>
                                @foreach($subcategories as $count => $subcategory)
                                    @php /** @var \App\Models\RecipeSubcategory $subcategory  */ @endphp
                                    @if ($subcategory->category_id === $category->id)
                                        <div class="row ml-3">
                                            <a href="{{ route('recipes.subcategory.index', $subcategory->id) }}">
                                                {{$subcategory->name}}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

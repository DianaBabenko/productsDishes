@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content ">
            <div class="title m-b-md">
                <h1 class="text-info"></h1>
                <img src="{{ \URL::to('/img/logo8.png') }}" style="width: 800px; margin-bottom: 50px;" alt="logo"/>
            </div>
            <div class="row justify-content-center" style="margin-bottom: 100px;">
                <div class="row">
                    <h3>
                        <a href="{{ route('recipes.index') }}">Recipes</a>
                    </h3>
                </div>
                <div class="row" style="margin-left: 150px;">
                    <h3>
                        <a href="{{ route('recipes.generate') }}">Generate dishes</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection


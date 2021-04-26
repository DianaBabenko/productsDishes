@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\User $user */ @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="POST" action="{{ route('account.update', [$user->id]) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-12">
                        <div class="header-div row justify-content-center shadow-sm radius-div">
                            <div class="">
                                <h3 class="mt-1">Edit account data</h3>
                            </div>
                        </div>
                        <div class="card-body  main-div  radius-div">
                            <div class="row w-full justify-content-center">
                                <div class="form-group col-3">
                                    <label for="name" class="ml-2">Name</label>
                                    <input name="name" value="{{ $user->name }}"
                                           id="name"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="surname" class="ml-2">Surname</label>
                                    <input name="surname" value="{{ $user->surname }}"
                                           id="surname"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="patronymic" class="ml-2">Patronymic</label>
                                    <input name="patronymic" value="{{ $user->patronymic }}"
                                           id="patronymic"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="form-group col-3">
                                    <label for="email" class="ml-2">Email</label>
                                    <input name="email" value="{{ $user->email }}"
                                           id="email"
                                           type="text"
                                           class="form-control field-input__div"
                                           required
                                    >
                                </div>
                                <div class="col-3 mb-3">
                                    <label>Photo</label>
                                    <div class="">
                                        <input type="file" value="{{ $user->image ?: '' }}" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-outline-lavand field-input__div">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="">
                    <div class="header-div row justify-content-center shadow-sm radius-div col-8 mx-auto">
                        <h3 class="mt-2">Registration</h3>
                    </div>

                    <div class="card-body main-div col-10 mx-auto radius-div">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row justify-content-center mt-2">
                                <div class="form-group col-3">
                                    <label for="name" class="ml-2">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-3">
                                    <label for="surname" class="ml-2">Surname</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group col-3">
                                    <label for="patronymic" class="ml-2">Patronymic</label>
                                    <input id="patronymic" type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" value="{{ old('patronymic') }}" required autocomplete="patronymic" autofocus>

                                    @error('patronymic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-5">
                                    <label for="email" class="ml-2">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-4">
                                    <label for="password" class="ml-2">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-4">
                                    <label for="password-confirm" class="ml-2">Confirm password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="form-group row mb-0">
                                    <div class="mx-auto">
                                        <button type="submit" class="btn btn-outline-lavand field-input__div">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

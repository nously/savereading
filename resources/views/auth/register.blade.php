@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hello, new neighbor!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <h5>Please tell me who you are</h5>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <hr>

                        <h5>Then, tinker your new home!</h5>

                        <div class="form-group row">
                            <label for="home_name" class="col-md-4 col-form-label text-md-right">{{ __('Home name') }}</label>

                            <div class="col-md-6">
                                <input id="home_name" type="text" class="form-control @error('home_name') is-invalid @enderror" name="home_name" value="{{ old('home_name') }}" required autocomplete="home_name" autofocus>

                                @error('home_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

                            <div class="col-md-6">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Favorite color') }}</label>
                            <div class="d-flex pb-3 ">
                                <initial-color-button item_color="bg-primary" class="pl-4 mx-auto btn btn-outline-primary"></initial-color-button>
                                <initial-color-button item_color="bg-secondary" class="pl-4 mx-auto btn btn-outline-secondary"></initial-color-button>
                                <initial-color-button item_color="bg-success" class="pl-4 mx-auto btn btn-outline-success"></initial-color-button>
                                <initial-color-button item_color="bg-danger" class="pl-4 mx-auto btn btn-outline-danger"></initial-color-button>
                                <initial-color-button item_color="bg-warning" class="pl-4 mx-auto btn btn-outline-warning"></initial-color-button>
                                <initial-color-button item_color="bg-info" class="pl-4 mx-auto btn btn-outline-info"></initial-color-button>
                                <initial-color-button item_color="bg-light" class="pl-4 mx-auto btn btn-outline-light" style="border: 2px dashed black"></initial-color-button>
                                <initial-color-button item_color="bg-dark" class="pl-4 mx-auto btn btn-outline-dark"></initial-color-button>
                            </div>
                        </div>

                        <input type="hidden" value="" name="item_color" id="item_color_input">

                        <div class="form-group row">
                            <label for="background" class="col-md-4 col-form-label text-md-right">{{ __('Background') }}</label>

                            <div class="col-md-6">
                                <input id="background" type="file" name="background">

                                @error('background')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

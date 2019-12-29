@extends('layouts.app')

@section('title')
<title>{{ __('lang.login') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- // mostramos mensaje --}}
            @include('includes.message')

            <div id="login-form" class="card">
                <div class="card-header">{{ __('lang.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('lang.login') }} " onSubmit="return validarPassword()">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('lang.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('lang.insert_password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('lang.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('lang.login') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // función para validar el formato de email y password
    function validarPassword(){

        var userEmail = document.getElementById("email").value;
        var p1 = document.getElementById("password").value;
        var htmlspecialchars2 = false;
        var htmlspecialchars3 = false;
        var cont = 0;
        var maxLenghtName = 50;
        var maxLenghtPassword = 20;

        var user2 = {
            email: userEmail,
        }

        var user3 = {
            password: p1,
        }

        Object.keys(user2).forEach(key => {
            cont = 0;
        console.log(user2[key])

        while (!htmlspecialchars2 && (cont < user2[key].length)) {
            if ((user2[key].charAt(cont) == " ") || (user2[key].charAt(cont) == "/") || (user2[key].charAt(cont) == "\\")
                || (user2[key].charAt(cont) == "{") || (user2[key].charAt(cont) == "}")  || (user2[key].charAt(cont) == "(")
                || (user2[key].charAt(cont) == ")") || (user2[key].charAt(cont) == "<") || (user2[key].charAt(cont) == ">")
                || (user2[key].charAt(cont) == "'")  || (user2[key].charAt(cont) == '"') || (user2[key].charAt(cont) == '[')
                || (user2[key].charAt(cont) == '[') || (user2[key].charAt(cont) == ',') ) {
                htmlspecialchars2 = true;
            }
            console.log(user2[key]);
            cont++;
        }

    })
        if (htmlspecialchars2) {
            swal('', 'El email no puede contener los siguentes caracteres: / \\ { } ( ) [ ] < > \' , "', 'error');
            return false;
        }

        Object.keys(user3).forEach(key => {
            cont = 0;
        console.log(user3[key])

        while (!htmlspecialchars3 && (cont < user3[key].length)) {
            if ((user3[key].charAt(cont) == " ") || (user3[key].charAt(cont) == "/") || (user3[key].charAt(cont) == "\\")
                || (user3[key].charAt(cont) == "{") || (user3[key].charAt(cont) == "}")  || (user3[key].charAt(cont) == "(")
                || (user3[key].charAt(cont) == ")") || (user3[key].charAt(cont) == "<") || (user3[key].charAt(cont) == ">")
                || (user3[key].charAt(cont) == "'")  || (user3[key].charAt(cont) == '"') || (user3[key].charAt(cont) == '[')
                || (user3[key].charAt(cont) == '[') || (user3[key].charAt(cont) == ',') || (user3[key].charAt(cont) == '.')) {
                htmlspecialchars3 = true;
            }
            console.log(user3[key]);
            cont++;
        }

    })
        // return false;

        if (htmlspecialchars3) {
            swal('', 'La contraseña no puede contener espacios en blanco,\nni los siguentes caracteres: / \\ { } ( ) [ ] < > \' , . "', 'error');
            return false;
        }

    }
</script>
@endsection


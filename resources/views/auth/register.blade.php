@extends('layouts.app')

@section('title')
<title>{{ __('lang.register') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- // mostramos mensaje --}}
            @include('includes.message')
            <div id="login-form" class="card">
                <div class="card-header">{{ __('lang.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('lang.register') }}"  onSubmit="return validarPassword()">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('lang.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('lang.surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ old('nick') }}" required autofocus>

                                @if ($errors->has('nick'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('lang.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('lang.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('lang.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    // función para validar el formato de nombre, password y confirmacion de password
    function validarPassword(){



        var userFirstName = document.getElementById("name").value;
        var userLastName = document.getElementById("surname").value;
        var nick = document.getElementById("nick").value;
        var userEmail = document.getElementById("email").value;
        var p1 = document.getElementById("password").value;
        var p2 = document.getElementById("password-confirm").value;
        var htmlspecialchars1 = false;
        var htmlspecialchars2 = false;
        var htmlspecialchars3 = false;
        var cont = 0;
        var maxLenghtName = 50;
        var maxLenghtPassword = 20;


        var user1 = {
            firstName: userFirstName,
            lastName: userLastName,
        }

        var nick ={
            nick: nick,
        }

        var user2 = {
            email: userEmail,
        }

        var user3 = {
            password: p1,
            confirmarLoginPassword: p2
        }

        Object.keys(user1).forEach(key => {
            cont = 0;
        console.log(user1[key])

        while (!htmlspecialchars1 && (cont < user1[key].length)) {
            if ( (user1[key].charAt(cont) == "/") || (user1[key].charAt(cont) == "\\")
                || (user1[key].charAt(cont) == "{") || (user1[key].charAt(cont) == "}")  || (user1[key].charAt(cont) == "(")
                || (user1[key].charAt(cont) == ")") || (user1[key].charAt(cont) == "<") || (user1[key].charAt(cont) == ">")
                || (user1[key].charAt(cont) == "'")  || (user1[key].charAt(cont) == '"') || (user1[key].charAt(cont) == '[')
                || (user1[key].charAt(cont) == '[') || (user1[key].charAt(cont) == ',') || (user1[key].charAt(cont) == '.')) {
                htmlspecialchars1 = true;
            }
            console.log(user1[key]);
            cont++;
        }

    })
        if (htmlspecialchars1) {
            swal('', 'Los nombres o apellidos no pueden contener los siguentes caracteres: / \\ { } ( ) [ ] < > \' , . "', 'error');
            return false;
        }

        Object.keys(nick).forEach(key => {
            cont = 0;
        console.log(nick[key])

        while (!htmlspecialchars1 && (cont < nick[key].length)) {
            if ( (nick[key].charAt(cont) == "/") || (nick[key].charAt(cont) == "\\")
                || (nick[key].charAt(cont) == "{") || (nick[key].charAt(cont) == "}")  || (nick[key].charAt(cont) == "(")
                || (nick[key].charAt(cont) == ")") || (nick[key].charAt(cont) == "<") || (nick[key].charAt(cont) == ">")
                || (nick[key].charAt(cont) == "'")  || (nick[key].charAt(cont) == '"') || (nick[key].charAt(cont) == '[')
                || (nick[key].charAt(cont) == '[') || (nick[key].charAt(cont) == ',') || (nick[key].charAt(cont) == '.')) {
                htmlspecialchars1 = true;
            }
            console.log(nick[key]);
            cont++;
        }

    })
        if (htmlspecialchars1) {
            swal('', 'El nick no puede contener los siguentes caracteres: / \\ { } ( ) [ ] < > \' , . "', 'error');
            return false;
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

        // return false;

        // Verificamos el formato de nombre y apellidos
        if (maxLenghtName < userFirstName.length || maxLenghtName < userLastName.length) {
            // alert ("El nombre debe tener 20 caracteres como máximo");
            // document.getElementById("login").focus();
            swal('', 'Los nombres y apellidos tener 50 caracteres como máximo" , .', 'error');

            return false;
        }

        // Verificamos el formato de password
        var cont = 0;

        if (maxLenghtPassword < p1.length) {
            // alert ("La contraseña debe tener 10 caracteres como máximo");
            // document.getElementById("loginPassword").focus();
            swal('', 'La contraseña debe tener 20 caracteres como máximo', 'error');

            return false;
        }

        // Verificamos que coincidan las contraseñas
        if (p1 != p2) {
            // alert ("Las contraseñas no coinciden");
            // document.getElementById("loginPassword").focus();
            swal('', 'Las contraseñas no coinciden', 'error');

            return false;
        }
    }
</script>


@endsection

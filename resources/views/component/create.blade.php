@extends('layouts.app')

@section('title')
<title>{{ __('lang.upload_picture') }}</title>
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('lang.upload_component') }}
                    </div>
                    <div class="card-body">
                    <form action="{{ route('component.save') }}" method="POST" id="" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-3 col-form-label text-md-right">{{ __('lang.category') }}</label>
                            <div class="col-md-8">
                                <select  type="select" id="category" name="category" class="form-control" required>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>

                                {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                @if ($errors->has('category'))
                                    <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                    </span>

                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('lang.name') }}</label>
                            <div class="col-md-8">
                                <input type="text"  id="name" name="name" class="form-control" required>

                                {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                @if ($errors->has('name'))
                                    <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>

                                @endif
                            </div>
                        </div>

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right">{{ __('lang.image') }}</label>
                                <div class="col-md-8">
                                    <input type="file" id="image_path" name="image_path" class="form-control  {{ $errors->has('image_path') ? 'is-invalid' : '' }}" required/>

                                    {{-- // si se produce un error en la validacion hay una variable disponible que es errors --}}
                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>

                                @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('lang.description') }}</label>
                                <div class="col-md-8">
                                    <textarea id="description" name="description" class="form-control" required></textarea>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                @if ($errors->has('description'))
                                    <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                    </span>

                                @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row justify-content-center"> --}}
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <input type="submit" value="{{ __('lang.upload_component') }}" id="" name="" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection




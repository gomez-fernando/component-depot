@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar datos del componente
                    </div>
                    <div class="card-body">
                    <form action="{{ route('component.update') }}" method="POST" id="" enctype="multipart/form-data">
                            @csrf

                    <input type="hidden" value="{{ $component->id }}" name="componentId" id="" />

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-8">



                                <input type="text" value="{{$component->name}}" id="name" name="name" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" />

                                {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>

                                @endif
                            </div>
                        </div>

                        <div class="container-avatar">
                            <img src="{{ route('component.file', ['filename' => $component->image_path]) }}" class="avatar" alt="">
                        </div>

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right">Nueva imagen</label>
                                <div class="col-md-8">



                                    <input type="file" id="image_path" name="image_path" class="form-control  {{ $errors->has('image_path') ? 'is-invalid' : '' }}" />

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>

                                @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-8">
                                <textarea id="description" name="description" class="form-control" required>{{ $component->description }}</textarea>

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
                                    <input type="submit" value="Actualizar componente" id="" name="" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection




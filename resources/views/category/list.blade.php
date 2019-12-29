@extends('layouts.app')

@section('title')
    <title>Gestionar categorías</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- // mostramos mensaje --}}
                @include('includes.message')
            </div>
        </div>

        <div class="card pub_image_solo pub_image_detail">
            <div class="card-body align-center">
                <a href="{{ route('category.new') }}" class="btn btn-success mb-5">Crear nueva categoría</a>

                <div class="row">
                    <h3>Gestionar categorías</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                                </td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                        Eliminar categoría
                                    </button>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirmación necesaria</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    ¿Confirma eliminar la categoría?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">Sí</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>




    </div>

@endsection

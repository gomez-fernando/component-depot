@extends('layouts.app')

@section('title')
    <title>{{ __('lang.users') }}</title>
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
                <div class="row">
                    <h3>Usuarios bloqueados</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nick</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha de alta</th>
                            <th scope="col">Fecha de bloqueo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inactiveUsers as $inactiveUser)
                            <tr>
                                <th scope="row">{{ $inactiveUser->id }}</th>
                                <td>{{ $inactiveUser->nick }}</td>
                                <td>{{ $inactiveUser->email }}</td>
                                <td>{{ date("d M y, g:i a",strtotime($inactiveUser->created_at)) }}</td>
                                <td>{{ date("d M y, g:i a",strtotime($inactiveUser->blocked_at)) }}</td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
                                        Desbloquear usuario
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
                                                    ¿Confirma desbloquear al usuario?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="{{ route('user.unblock', ['id' => $inactiveUser->id]) }}" class="btn btn-warning">Sí</a>
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

                <hr>

                <div class="row">
                    <h3>Usuarios activos</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nick</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha de alta</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($activeUsers as $activeUser)
                            <tr>
                                <th scope="row">{{ $activeUser->id }}</th>
                                <td>{{ $activeUser->nick }}</td>
                                <td>{{ $activeUser->email }}</td>
                                <td>{{ date("d M y, g:i a",strtotime($activeUser->created_at)) }}</td>
                                <td>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                        Bloquear usuario
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
                                                    ¿Confirma bloquear al usuario?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <a href="{{ route('user.block', ['id' => $activeUser->id]) }}" class="btn btn-danger">Sí</a>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>

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

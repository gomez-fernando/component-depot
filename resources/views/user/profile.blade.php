@extends('layouts.app')

@section('title')
<title>{{ __('lang.profile') }}</title>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

        <div class="profile-user">
            @if ($user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename'=>$user->image] ) }}" alt="" class="avatar">
            </div>
            @endif
            <div class="user-info">
                <h1>{{ '@'.$user->nick }}</h1>
                <h2>{{ $user->name.' '.$user->surname }}</h2>
            <p>{{ 'Se unió '.\FormatTime::LongTimeFilter($user->created_at, 'm') }}</p>
            </div>
        <div class="clearfix"></div>
            <hr>
        </div>

        <div class="clearfix"></div>

      {{-- // muestro las fotos --}}
      {{-- @foreach ($user->images as $image) --}}
      @foreach ($images as $image)
        @include('includes.component', ['component' => $image])
      @endforeach
      {{-- // añadimos enlaces de paginacion --}}
      {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
      <div class="clearfix"></div>
      <div class="row justify-content-center">
            {{-- {{ $user->images->links() }} --}}
            {{ $images->links() }}
      </div>

    </div>

  </div>
</div>
@endsection


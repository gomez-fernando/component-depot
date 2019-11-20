@extends('layouts.app')

@section('title')
<title>{{ __('lang.people') }}</title>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <h1>{{ __('lang.people') }}</h1>
    <form action="{{ route('user.index') }}" method="GET" id="buscador">
            <div class="form-group col">
                    <input type="text" id="search" name="" />
                    <input type="submit" value="{{ __('lang.search') }}" id="" name="" class="btn btn-sm btn-primary" />
            </div>
        </form>
        <hr>
      {{-- // muestro los usuarios --}}
      @foreach ($users as $user)
      <div class="profile-user">
            @if ($user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename'=>$user->image] ) }}" alt="" class="avatar">
            </div>
            @endif
            <div class="user-info">
                <h2>{{ '@'.$user->nick }}</h2>
                <h3>{{ $user->name.' '.$user->surname }}</h3>
            <p>{{ 'Se unió '.\FormatTime::LongTimeFilter($user->created_at, 'm') }}</p>
            <a href="{{ route('profile', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">{{ __('lang.see_profile') }}</a>
            </div>
        <div class="clearfix"></div>
            <hr>
        </div>
      @endforeach
      {{-- // añadimos enlaces de paginacion --}}
      {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
      <div class="clearfix"></div>
      <div class="row justify-content-center">
            {{ $users->links() }}
      </div>

    </div>

  </div>
</div>
@endsection

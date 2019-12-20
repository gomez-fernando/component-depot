@extends('layouts.app')

@section('title')
<title>{{ __('lang.favorites') }}</title>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <h1>{{ __('lang.favorite_components') }}</h1>
        <hr>

        @foreach ($likes as $like)
            @include('includes.component', ['component' =>$like->component,
            'rated' => \App\Helpers\VotesQuantityHelper::votesQuantity($like->component)])
        @endforeach

              {{-- // añadimos enlaces de paginacion --}}
      {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
      <div class="clearfix"></div>
      <div class="row justify-content-center">
            {{ $likes->links() }}

    </div>

  </div>
</div>
@endsection

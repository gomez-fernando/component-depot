@extends('layouts.app')

@section('title')
<title>{{ __('lang.home') }}</title>
@endsection



@section('content')

    <div class="container">

        <div class="row justify-content-center">
    <div class="col-md-8">
      {{-- // mostramos mensaje --}}
        @include('includes.message')
      {{-- // mustro los componentes --}}
        @if (Auth::check())
            @foreach ($components as $component)
                @include('includes.component', ['component' => $component, 'averageRating' => \App\Helpers\RatingsHelper::getAverageForComponent($component->id), 'rated' => \App\Helpers\RatingsHelper::getRated($component->id), 'ratingsQuantity' => \App\Helpers\RatingsHelper::ratingsQuantity($component->id)])
            @endforeach
        @else
            @foreach ($components as $component)
                @include('includes.componentG', ['component' => $component, 'averageRating' => \App\Helpers\RatingsHelper::getAverageForComponent($component->id), 'ratingsQuantity' => \App\Helpers\RatingsHelper::ratingsQuantity($component->id)])
            @endforeach
        @endif

      {{-- // añadimos enlaces de paginacion --}}
      {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
      <div class="clearfix"></div>
      <div class="row justify-content-center">
            {{ $components->links() }}
      </div>

    </div>

  </div>
</div>
@endsection


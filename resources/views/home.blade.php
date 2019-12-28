@extends('layouts.app')

@section('title')
<title>{{ __('lang.home') }}</title>
@endsection



@section('content')

    <div class="container">
        {{-- // mostramos mensaje --}}
        @include('includes.message')
        <div class="row justify-content-center">

      {{-- // mustro los componentes --}}
        @if (Auth::check())
            @foreach ($components as $component)
                    <div class="col-12 col-md-6  col-lg-4 mb-4">

                    @include('includes.component', ['component' => $component, 'averageRating' => \App\Helpers\RatingsHelper::getAverageForComponent($component->id), 'rated' => \App\Helpers\RatingsHelper::getRated($component->id), 'ratingsQuantity' => \App\Helpers\RatingsHelper::ratingsQuantity($component->id)])
                    </div>
            @endforeach
        @else
            @foreach ($components as $component)
                <div class="col-12 col-md-6  col-lg-4 mb-4">

                @include('includes.componentG', ['component' => $component, 'averageRating' => \App\Helpers\RatingsHelper::getAverageForComponent($component->id), 'ratingsQuantity' => \App\Helpers\RatingsHelper::ratingsQuantity($component->id)])
                </div>
            @endforeach
        @endif

      {{-- // añadimos enlaces de paginacion --}}
      {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
      <div class="clearfix"></div>
      <div class="row justify-content-center">
            {{ $components->links() }}
      </div>

{{--    </div>--}}

  </div>
</div>
@endsection


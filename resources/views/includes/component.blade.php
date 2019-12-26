<div class="col-sm-12">
<div class="card pub_image h-100 card-body">
    <div class="card-header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="data-user">
      <a href="{{ route('component.detail', ['id' => $component->id]) }}">
        {{ $component->name}}
        </a>
      </div>

    </div>

{{--    {{ $identity }}--}}


    <div class="card-body">
      <div>
        <img class="img-fluid" src="{{ route('component.file', ['filename' => $component->image_path]) }}" alt="imagen del componente">
      </div>

        <div class="description">
            <a href="{{ route('component.detail', ['id' => $component->id]) }}">
                {{ $component->name}}
            </a>
        </div>

      <div class="description">

        <p>
          {{ $component->description }}
        </p>
      </div>
      <div class="row ">

          <div class="likes">
{{--              <a href="{{ route('component.detail', ['id' => $component->id]) }}">--}}
                  {{--           Comprobar si el usuario le dio like a la imagen--}}
                  @if (Auth::check())
                      <?php $user_like = false ?>
                      @foreach ($component->likes as $like)
                          @if ($like->user->id == Auth::user()->id)
                              <?php $user_like = true ?>
                          @endif
                      @endforeach


                      @if ($user_like)
                          <img class="img-fluid" src="{{ asset('img/facebook-like-64-blue.png') }}" alt="" data-id="{{ $component->id }}" class="btn-dislike">
                      @else
                          <img class="img-fluid" src="{{ asset('img/facebook-like-64-gray.png') }}" alt="" data-id="{{ $component->id }}" class="btn-like">
                      @endif
                      <span class="number_likes">{{ count($component->likes) }}</span>
                  @else
                      <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="">
                      <span class="number_likes">{{ count($component->likes) }}</span>

                  @endif
{{--              </a>--}}
          </div>
      </div>

    <div class="row justify-content-center mt-2">

        <div class="stars"  >
            {{--        //pintamos el average--}}

            <select id="stars-{{$component->id}}" class="stars">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>

    </div>
        <div class="row justify-content-center mb-2">
             <span>
                @if ($ratingsQuantity == 1)
                     {{ $ratingsQuantity }} valoración
                 @else
                     {{ $ratingsQuantity }} valoraciones
                 @endif
            </span>
        </div>
      {{-- // comentarios --}}
      <div class="comments">
          <a href="{{ route('component.detail', ['id' => $component->id]) }}" class="btn btn-sm btn-warning btn-comments">{{ __('lang.comments') }} ({{ count($component->comments) }})</a>
{{--          <input type="text" id="valorDeId" value="{{ $component->id }}">--}}
      </div>
    </div>
  </div>
</div>

<script>
    var componentId = '{{ $component->id }}';
    // var valorDeId = $('#valorDeId').val();
    var averageRating = parseInt({{ $averageRating }});
    var rated = parseInt({{$rated}});

    console.log(rated + 'votaciones');


    var userId = '{{ Auth::user()->id}}';
    var urlRatingStore = '{{route('rating.store')}}';

    console.log(userId);
    console.log(urlRatingStore);
</script>

<script src="{{asset('js/jsBarrating.js')}}"></script>
<script src="{{ asset('js/stars.js') }}"></script>

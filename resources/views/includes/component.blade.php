<div class="col-sm-12">
<div class="card pub_image h-100 card-body">
    <div class="card-header">

      <div class="data-user">
      <a href="{{ route('component.detail', ['id' => $component->id]) }}">
        {{ $component->name}}
        </a>
      </div>

    </div>

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
      <div class="likes btn btn-primary">Leer m&aacute;s <i></i>>
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

          {{--        //pintamos el average--}}

{{--          $averageRating = \App\Helpers\RatingsHelper::getAverageForComponent();--}}

          <select id="stars">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>

    </div>
      {{-- // comentarios --}}
      <div class="comments">
          <a href="{{ route('component.detail', ['id' => $component->id]) }}" class="btn btn-sm btn-warning btn-comments">{{ __('lang.comments') }} ({{ count($component->comments) }})</a>
      </div>
    </div>
  </div>
</div>

@section('js')


    <script src="{{asset('js/jsBarrating.js')}}"></script>
    <script type="text/javascript">
        $("#stars").on("click",function(){
            alert('hola')
        })
        let averageRating = parseInt('{{$averageRating}}');
        console.log(averageRating);
        $(document).ready(function () {


            let $control = $('#stars').barrating({
                theme: 'fontawesome-stars',
                silent: false,
                readonly: true,
                onSelect: function() {
                    // alert ('holas');
                }
            });

            $control.barrating('set' , averageRating);

            $.ajax({url: "rating", success: function(result){
                    $("#div1").html(result);
                }})

        });



    </script>
@endsection



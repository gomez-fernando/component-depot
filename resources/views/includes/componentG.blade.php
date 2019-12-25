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
            <div class="row">
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

            <div class="row">
                <div class="stars">
                    {{--        //pintamos el average--}}

                    {{--          $averageRating = \App\Helpers\RatingsHelper::getAverageForComponent();--}}

                    <select id="stars-{{$component->id}}" class="stars">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <span>
                @if ($ratingsQuantity == 1)
                            {{ $ratingsQuantity }} valoración
                        @else
                            {{ $ratingsQuantity }} valoraciones
                        @endif
            </span>
                </div>

            </div>
            {{-- // comentarios --}}
            <div class="comments">
                <a href="{{ route('component.detail', ['id' => $component->id]) }}" class="btn btn-sm btn-warning btn-comments">{{ __('lang.comments') }} ({{ count($component->comments) }})</a>
            </div>
        </div>
    </div>
</div>

<script>


    var componentId = '{{ $component->id }}';
    var averageRating = parseInt('{{\App\Helpers\RatingsHelper::getAverageForComponent($component->id)}}');


        {{--var userId = '{{ Auth::user()->id}}';--}}
    var urlRatingStore = '{{route('rating.store')}}';

    // console.log(userId);
    console.log(urlRatingStore);



</script>

<script src="{{asset('js/jsBarrating.js')}}"></script>
{{--    <script src="{{ asset('js/stars.js') }}"></script>--}}
<script>


    var averageRating = averageRating;
    var userId = userId;
    var id = 'stars-' + componentId;
    var urlRatingStore = urlRatingStore;



    var $control = $('#'+id).barrating({
        theme: 'fontawesome-stars',
        silent: true,
        initialRating:null,
        readonly: true,
        emptyRatingValue : true,
        onSelect: function(value, text) {

            data = {
                user_id: userId,
                component_id: componentId,
                value: value
            }
            urlAjax = urlRatingStore;

            $.ajax({
                url:urlAjax,
                data:data,
                method: "POST",
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(response) {
                console.log(response)
            });


        }
    });


    $control.barrating('set' , averageRating);




</script>

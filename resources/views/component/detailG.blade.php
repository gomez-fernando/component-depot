@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- // mostramos mensaje --}}
                @include('includes.message')

                <div class="card pub_image_solo pub_image_detail_solo">
                    <div class="card-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}">

                        <div class="data-user mr-auto">
                            {{ $component->name}}

                        </div>



                    </div>

                    <div class="card-body align-center">
                        <div class="row  justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8">
                                <img class="mw-100" src="{{ route('component.file', ['filename' => $component->image_path]) }}" alt="">
                            </div>
                        </div>

                        <div class="name_component">
                            <p>
                                <strong>{{ $component->name }}</strong>
                            </p>

                        </div>
                        <div class="likes">

                                <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="">
                                <span class="number_likes">{{ count($component->likes) }}</span>

                            {{--        //pintamos el average--}}

                            <div class="row justify-content-center mt-2">
                                <div class="stars">
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

                        </div>

                        {{-- // descripción --}}
                        <div class="clearfix"></div>
                        <div class="description">
                            <h2>Descripción</h2>
                            <hr>
                            <div class="comment">

                                <p>
                                    {{ $component->description }} <br>

                                </p>

                            </div>
                        </div>
                        <hr>

                        {{-- // comentarios --}}
                        <div class="clearfix"></div>
                        <div class="comments">
                            <h2>Comentarios ({{ count($component->comments) }})</h2>

                            @foreach ($component->comments as $comment)
                                <div class="comment">
            <span class="nickname">
                {{ '@'.$comment->user->nick }}
            </span>
                                    <span class="nickname date">{{ ' | '.\FormatTime::LongTimeFilter($comment->created_at, 'M') }}</span>

                                    <p>
                                        {{ $comment->content }} <br>
                                        @if (Auth::check() && (Auth::user()->role == 'admin' ))
                                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-light">Eliminar comentario</a>

                                        @endif
                                    </p>

                                </div>
                            @endforeach
                        </div>
                    </div>
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
@endsection




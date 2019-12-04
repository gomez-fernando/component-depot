@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- // mostramos mensaje --}}
                @include('includes.message')

                <div class="card pub_image pub_image_detail">
                    <div class="card-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}">

                        <div class="data-user mr-auto">
                            {{ $component->name}}

                        </div>



                    </div>

                    <div class="card-body">
                        <div class="">
                            <img class="img-fluid" src="{{ route('component.file', ['filename' => $component->image_path]) }}" alt="">
                        </div>

                        <div class="description">
                            <p>
                                <strong>{{ $component->name }}</strong>
                            </p>

                            <p>
                                {{ $component->description }}
                            </p>
                        </div>
                        <div class="likes">
                            {{--           Comprobar si el usuario le dio like a la imagen--}}
                            @if (Auth::check())
                                <?php $user_like = false ?>
                                @foreach ($component->likes as $like)
                                    @if ($like->user->id == Auth::user()->id)
                                        <?php $user_like = true ?>
                                    @endif
                                @endforeach

                                {{--{{  dd($ratings) }}--}}
                                {{--            @foreach ($ratings as $rating)--}}
                                {{--                {{ $rating }}--}}
                                {{--            @endforeach--}}
                                @if ($user_like)
                                    <img src="{{ asset('img/facebook-like-64-blue.png') }}" alt="" data-id="{{ $component->id }}" class="btn-dislike">
                                @else
                                    <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="" data-id="{{ $component->id }}" class="btn-like">
                                @endif
                                <span class="number_likes">{{ count($component->likes) }}</span>

                            @else
                                {{--            <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="" data-id="{{ $component->id }}" class="btn-like">--}}
                                <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="">
                                <span class="number_likes">{{ count($component->likes) }}</span>

                            @endif

                            {{--        //pintamos el average--}}
                            <select id="stars">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                        </div>

                        {{-- // descripción --}}
                        <div class="clearfix"></div>
                        <div class="comments">
                            <h2>Descripción</h2>
                            <hr>
                            <div class="comment">

                                <p>
                                    {{ $component->description }} <br>

                                </p>

                            </div>
                        </div>

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

@endsection


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

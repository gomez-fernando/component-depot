<div class="card pub_image">
    <div class="card-header">

      <div class="data-user">
      <a href="{{ route('component.detail', ['id' => $component->id]) }}">
        {{ $component->name}}
        </a>
      </div>

    </div>

    <div class="card-body">
      <div class="image-container">
        <img src="{{ route('component.file', ['filename' => $component->image_path]) }}" alt="imagen del componente">
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
      <div class="likes"  class="btn">Leer m&aacute;s <i></i>>
{{--           Comprobar si el usuario le dio like a la imagen--}}
          @if (Auth::check())
              <?php $user_like = false ?>
              @foreach ($component->likes as $like)
                  @if ($like->user->id == Auth::user()->id)
                      <?php $user_like = true ?>
                  @endif
              @endforeach


                  @if ($user_like)
                      <img src="{{ asset('img/facebook-like-64-blue.png') }}" alt="" data-id="{{ $component->id }}" class="btn-dislike">
                  @else
                      <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="" data-id="{{ $component->id }}" class="btn-like">
                  @endif
                  <span class="number_likes">{{ count($component->likes) }}</span>

          @else
              <img src="{{ asset('img/facebook-like-64-gray.png') }}" alt="">
              <span class="number_likes">{{ count($component->likes) }}</span>

          @endif
    </div>
      {{-- // comentarios --}}
      <div class="comments">
          <a href="{{ route('component.detail', ['id' => $component->id]) }}" class="btn btn-sm btn-warning btn-comments">{{ __('lang.comments') }} ({{ count($component->comments) }})</a>
      </div>
    </div>
  </div>

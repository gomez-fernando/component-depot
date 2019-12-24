{{-- mostramos mensaje de exito o no en la actalizacion --}}
@if (session('message'))
    @if (session('status') == 'error')
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @else ()
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endif


{{-- mostramos mensaje de exito o no en la actualizacion --}}
@if (session('message'))
    @if (session('status') == 'error')
        <div class="alert alert-danger text-center">
            {{ session('message') }}
        </div>
    @else ()
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
@endif


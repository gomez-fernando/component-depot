{{-- mostramos mensaje de exito en la actalizacion --}}
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

{{-- añadir tambien un mensaje de alert danger --}}

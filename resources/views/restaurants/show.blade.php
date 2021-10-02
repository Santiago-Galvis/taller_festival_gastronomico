@extends('layouts.app')

@section('content')

<div class="container">

    <h3>
        <small class="text-muted">Restaurante</small>
        {{ $restaurant -> name }}
    </h3>

    Servimos en {{ $restaurant->city }} en el horario de {{ $restaurant->schedule ?? "Sin agenda definida." }}<br>

    @if ($restaurant->delivery == "y")
        Tenemos domicilios al numero {{ $restaurant->phone }}.<br>
        @else
        Contactenos para mas informacion al numero {{ $restaurant->phone }}.<br>
    @endif

    <div class="btn-group" role="group" aria-label="Basic Example">
        <a href="{{ route("restaurants.edit", $restaurant->id) }}" class="btn btn-warning">Editar</a>

        {{ Form::open(['route' => [
        'restaurants.destroy', $restaurant->id], 
        'method' => 'delete',
        'onsubmit' => 'return confirm(\'¿Desea eliminar el restaurante?, esto no se puede deshacer..\')' 
        ]) }}
        <button type="submit" class="btn btn-danger ml-2">Remover</button>
        {!! Form::close() !!}
    </div>    


</div>
@endsection
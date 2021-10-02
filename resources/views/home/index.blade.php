@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis restaurantes</h1>
        <a href="{{ route('restaurants.create') }}" class="btn btn-primary" 
        title="Crear nuevo restaurante">Crear</a>
        <br>
        <br>
        <ul class="list-group list-group-flush">
        <br>
            @foreach ($restaurants as $restaurant)
                <li class="list-group-item h4">
                    <a href="{{ route("restaurants.show", $restaurant->id) }}" title="Visitar a este restaurante">{{$restaurant->name}}</a>

                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ route("restaurants.edit", $restaurant->id) }}" class="btn btn-warning ml-2">Editar</a>

                        {{ Form::open(['route' => [
                        'restaurants.destroy', $restaurant->id], 
                        'method' => 'delete',
                        'onsubmit' => 'return confirm(\'¿Desea eliminar el restaurante?, esto no se puede deshacer..\')' 
                        ]) }}
                        <button type="submit" class="btn btn-danger ml-2">Remover</button>
                        {!! Form::close() !!}
                    </div>                   

                </li>
            @endforeach
        </ul>
    </div>
    
@endsection

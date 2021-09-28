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
                <!-- TODO: agregar el enlace a ver restaurante del propietario -->
                    <a href="" title="Visitar a este restaurante">{{$restaurant->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    
@endsection

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Nuestros Restaurantes</h1>

        <?php
            $rows = $restaurants->count() / 4;
        ?>

        @for ($i = 0; $i < $rows; $i++)   
            <div class="row">
                @for ($j = 0; $j < 4; $j++)
                    @if (isset($restaurants[($i*4)+$j]))

                        <?php
                            $restaurant = $restaurants[($i*4)+$j];
                        ?>

                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset('images/restaurant.png')}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-tittle">{{ $restaurant->name }}</h5>
                                    <h6 class="text-muted">{{ $restaurant->category->name }}</h4>
                                    <p class="card-text">{{ $restaurant->description }}</p>
                                    <a href="{{ route("restaurants.show", $restaurant->id) }}" class="btn btn-primary">Visítenos</a>
                                </div>
                            </div>
                        </div> 
                    @endif
                @endfor
            </div>
        @endfor
    </div>
@endsection
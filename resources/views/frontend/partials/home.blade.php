@extends('frontend.master.master')
@section('front_content')

<div class="my-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4 g-4">
       @isset($cars)
           @foreach ($cars as $item)
           <div class="col">
                <div class="card">
                    <img class="img-fluid" src="https://th.bing.com/th/id/OIP.9AA9ELQUr6WsoCJ2WcVcEwHaEK?rs=1&pid=ImgDetMain" class="card-img-top" alt="Transport Car">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $item->name ?? '' }}</h5>
                    <p class="card-text">Brand: {{ $item->brand ?? '' }}</p>
                    <p class="card-text">Model: {{ $item->model ?? '' }}</p>
                    <p class="card-text">Car Type: {{ $item->car_type ?? '' }}</p>
                    <p class="card-text">Rent Price: {{ $item->rent_price ?? '' }}</p>
                    <a href="{{ route('car.show', $item->id) }}" class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
           @endforeach
       @endisset
    </div>
</div>

@endsection

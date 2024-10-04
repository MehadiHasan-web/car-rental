@extends('admin.master.master')
@section('content')
{{-- create bootstrap cars create form with error handling--}}
<div class="container">
    <h1>Create Edit</h1>
    <form class="card p-2" action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $car->name }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter brand" value="{{ $car->brand }}">
            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">model</label>
            <input type="text" class="form-control" name="model" id="model" placeholder="Enter model" value="{{ $car->model }}">
            @error('model')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" class="form-control" name="car_type" id="car_type" placeholder="Enter car_type" value="{{ $car->car_type }}">
            @error('car_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rent_price" class="form-label">Rent Price</label>
            <input type="number" class="form-control" name="rent_price" id="rent_price" placeholder="Enter rent_price" value="{{ $car->rent_price }}">
            @error('rent_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">photo</label>
            <input type="file" class="form-control" name="photo" id="photo">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status1" {{ $car->status == 0 ? 'checked' : '' }} value="0">
            <label class="form-check-label" for="status1">
                Available
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status2" value="1" {{ $car->status == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="status2">
                Not Available
            </label>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

@extends('admin.master.master')

@section('content')
    <div class="card p-4">
        <table id="dataTable" class="display table table-hover border" style="width:100%">
            <thead class="border">
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Car type</th>
                    <th>Rent price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($cars)
                    @foreach($cars as $item)
                        <tr>
                            <td>
                                <img class="rounded-full" style="width: 38px; height:38px;" src="https://th.bing.com/th/id/R.a13c35fa266df12db2b09a92f1e2a3ba?rik=IVYLuAVu8Xk6sw&pid=ImgRaw&r=0" alt="">
                                {{ $item->name ?? '' }}</td>
                            <td>{{ $item->brand ?? '' }}</td>
                            <td>{{ $item->model ?? '' }}</td>
                            <td>{{ $item->car_type ?? '' }}</td>
                            <td>{{ $item->rent_price ?? '' }}</td>
                            <td>{{  $item->status == 0 ? 'Avaliable' : 'Not Avaliable' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a class="btn btn-success" href="{{ route('cars.edit', $item->id) }}"  >Edit</a>
                                    <form action="{{ route('cars.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endisset


            </tbody>
            <tfoot>
                <tr>
                    <th> Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Car type</th>
                    <th>Rent price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

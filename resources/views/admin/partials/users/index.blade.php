@extends('admin.master.master')

@section('content')
    <div class="card p-4">
        <h4>All Users</h4>
        <table id="dataTable" class="display table table-hover border" style="width:100%">
            <thead class="border">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @isset($users)
                    @foreach($users as $item)
                        <tr>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->role === '0' ? 'User' : 'Admin'  }}</td>
                        </tr>
                    @endforeach
                @endisset


            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th></th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

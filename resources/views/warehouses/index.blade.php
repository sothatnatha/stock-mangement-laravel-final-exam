@extends('dashboard')
@section('title', 'Warehouse | List')

@section('right')
    <div class="container-fluid">
        <br><a href="/warehouses/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
        <div class="card p-4">
            @if (session('message'))
                {{-- <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div> --}}
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fas fa-check" style="margin-right:5px;"></i>
                    <div>
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            @unless (count($warehouses) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Warehouse name</th>
                        <th>Address</th>
                        <th>Capacity</th>

                        <th>Created</th>
                        <th>Updatd</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($warehouses as $warehouse)
                        <tr>
                            <td>
                                <b>
                                    <p class="">
                                        {{ $warehouse->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $warehouse->warehouse_name }}
                            </td>
                            <td>
                                {{ $warehouse->address }}
                            </td>
                            <td>
                                {{ $warehouse->capacity }} m<sup>2</sup>
                            </td>


                            <td>{{ date('D d-M-Y', strtotime($warehouse->created_at)) }}</td>
                            <td>{{ date('D d-M-Y', strtotime($warehouse->updated_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/warehouses/{{ $warehouse->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $warehouse->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $warehouse->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $warehouse->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $warehouse->id }}">
                                                        Delete
                                                        Warehouse</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the warehouse
                                                        <strong>{{ $warehouse->warehouse_name }}</strong>?
                                                    </p>
                                                    <div class="description">
                                                        <p>Warehouse name: <strong>{{ $warehouse->warehouse_name }}</strong>
                                                        </p>
                                                        <p>Location: <strong>{{ $warehouse->address }}</strong></p>
                                                        <p>Capacity: <strong>{{ $warehouse->capacity }} m<sup>2</sup></strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/warehouses/{{ $warehouse->id }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <input type="submit" class="btn btn-danger btn-sm" value="Confirm" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>Empty list</p>
            @endunless

        </div>
    </div>
@endsection

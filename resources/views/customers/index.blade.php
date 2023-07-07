@extends('dashboard')
@section('title', 'Warehouse | List')

@section('right')
    <div class="container-fluid">
        <br><a href="/customers/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
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
            @unless (count($customers) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Customer name</th>
                        <th>Phone</th>
                        <th>Shipping address</th>
                        <th>Payment info</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($customers as $cus)
                        <tr>
                            <td>
                                <b>
                                    <p class="">
                                        {{ $cus->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $cus->cname }}
                            </td>
                            <td>
                                {{ $cus->phone_number }}
                            </td>
                            <td>
                                {{ $cus->shipping_address }}
                            </td>

                            <td>
                                {{ $cus->payment_method }}
                            </td>

                            <td>{{ date('D d-M-Y', strtotime($cus->created_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/customers/{{ $cus->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $cus->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $cus->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $cus->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $cus->id }}">
                                                        Delete
                                                        customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete customer
                                                        <strong>{{ $cus->cname }}</strong>?
                                                    </p>
                                                    <div class="description">
                                                        <p>id: <strong>{{ $cus->id }}</strong></p>
                                                        <p>Customer name: <strong>{{ $cus->cname }}</strong>
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/customers/{{ $cus->id }}" method="POST"
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

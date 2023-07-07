@extends('dashboard')
@section('title', 'Orders | List')

@section('right')
    <div class="container-fluid">
        <br><a href="/orders/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>

        <div class="card p-4">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @unless (count($orders) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Order date</th>
                        <th>Delivery date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($orders as $ord)
                        <tr>
                            <td>
                                <b>
                                    <p class="">
                                        {{ $ord->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $ord->pname }}
                            </td>
                            <td>
                                {{ $ord->qty }}
                            </td>

                            <td>{{ date('D d-M-Y', strtotime($ord->order_date)) }}</td>
                            <td>{{ date('D d-M-Y', strtotime($ord->delivery_date)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/orders/{{ $ord->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $ord->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $ord->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $ord->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $ord->id }}">
                                                        Delete
                                                        Order</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the order
                                                        <strong>{{ $ord->pname }}</strong>?
                                                    </p>
                                                    <div class="description">
                                                        <p>Product: <strong>{{ $ord->pname }}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/orders/{{ $ord->id }}" method="POST"
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

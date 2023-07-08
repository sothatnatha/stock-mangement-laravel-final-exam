@extends('dashboard')
@section('title', 'Sale | List')

@section('right')
    <div class="container-fluid">
        <br><a href="/sales/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
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
            @unless (count($sales) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Sale date</th>
                        <th>Customer</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>
                                <b>
                                    <p class="">
                                        {{ $sale->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $sale->pname }}
                            </td>
                            <td>
                                {{ $sale->qty }}
                            </td>
                            <td>
                                {{ $sale->sale_date }}
                            </td>

                            <td>
                                {{ $sale->cname }}
                            </td>

                            <td>{{ date('D d-M-Y', strtotime($sale->created_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/sales/{{ $sale->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $sale->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $sale->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $sale->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $sale->id }}">
                                                        Delete
                                                        Sale</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete Sale
                                                        <strong>{{ $sale->customer_id }}</strong>?
                                                    </p>
                                                    <div class="description">
                                                        <p>id: <strong>{{ $sale->id }}</strong></p>
                                                        <p>Product name: <strong>{{ $sale->product_id }}</strong>
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/customers/{{ $sale->id }}" method="POST"
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

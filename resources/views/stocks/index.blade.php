@extends('dashboard')
@section('title', 'Stock | List')

@section('right')
    <div class="container-fluid">
        <br><a href="/stocks/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>

        <div class="card p-4">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @unless (count($stocks) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Location</th>
                        <th>Created</th>
                        <th>Updatd</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($stocks as $st)
                        <tr>
                            <td>
                                <b>
                                    <p class="">
                                        {{ $st->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $st->pname }}
                            </td>
                            <td>
                                {{ $st->qty }}
                            </td>
                            <td>
                                {{ $st->location }}
                            </td>

                            <td>{{ date('D d-M-Y', strtotime($st->created_at)) }}</td>
                            <td>{{ date('D d-M-Y', strtotime($st->updated_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/stocks/{{ $st->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $st->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $st->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $st->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $st->id }}">
                                                        Delete
                                                        Stock list</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the stock list
                                                        <strong>{{ $st->pname }}</strong>?
                                                    </p>
                                                    <div class="description">
                                                        <p>Product: <strong>{{ $st->pname }}</strong></p>
                                                        <p>Qty available: <strong>{{ $st->qty }}</strong></p>
                                                        <p>Location: <strong>{{ $st->location }}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/stocks/{{ $st->id }}" method="POST"
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

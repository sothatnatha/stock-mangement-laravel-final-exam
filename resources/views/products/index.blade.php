@extends('dashboard')
@section('title', 'Product | List')

@section('right')
    <br><a href="/products/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
            </div>
            @unless (count($products) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Supplier</th>
                        <th>Category</th>
                        <th>Created</th>

                        <th>Action</th>
                    </tr>
                    @foreach ($products as $p)
                        <tr>
                            {{-- checkbox row for multi delete purpose --}}
                            {{-- <td>
                            <input type="checkbox" name="chk_ids[]" id="chk_ids[]" value="" />
                        </td> --}}
                            {{-- end checkbox row for multi delete purpose --}}

                            <td>
                                <b>
                                    <p class="">
                                        {{ $p->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $p->pname }}
                            </td>
                            <td>
                                {{ $p->description }}
                            </td>
                            <td>
                                $ {{ $p->price }}
                            </td>
                            <td>
                                {{ $p->qty }}
                            </td>
                            <td>
                                {{ $p->supplier_name }}
                            </td>
                            <td>
                                {{ $p->category_name }}
                            </td>
                            <td>{{ date('D d-M-Y', strtotime($p->created_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">

                                    <a href="/products/{{ $p->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $p->id }}">
                                        Delete
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel{{ $p->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $p->id }}">Delete
                                                        Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the product
                                                        <strong>{{ $p->pname }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form action="/products/{{ $p->id }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <input type="submit" class="btn btn-danger btn-sm" />
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

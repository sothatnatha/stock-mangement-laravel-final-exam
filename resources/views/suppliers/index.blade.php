@extends('dashboard')
@section('title', 'Supplier | List')

@section('right')

    <br><a href="/suppliers/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
    @if (session('message'))
        <div class="alert alert-success mt-4" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
            </div>
            @unless (count($suppliers) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            {{-- checkbox row for multi delete purpose --}}
                            {{-- <td>
                            <input type="checkbox" name="chk_ids[]" id="chk_ids[]" value="" />
                        </td> --}}
                            {{-- end checkbox row for multi delete purpose --}}

                            <td>
                                <b>
                                    <p class="">
                                        {{ $supplier->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $supplier->supplier_name }}
                            </td>
                            <td>
                                {{ $supplier->contact_info }}
                            </td>
                            <td>
                                {{ $supplier->address }}
                            </td>
                            <td>{{ date('D d-M-Y', strtotime($supplier->created_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">
                                    <a href="/suppliers/{{ $supplier->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>
                                    <form action="/suppliers/{{ $supplier->id }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                    </form>
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

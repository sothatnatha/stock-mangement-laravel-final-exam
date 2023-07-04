@extends('dashboard')
@section('title', 'Category | List')
@section('right')

    <br><a href="/categories/create" class=" btn btn-primary btn-sm mb-4"> New <i class="fas fa-plus nav-icon"></i></a>
    @if (session('message'))
        <div class="alert alert-success mt-4" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
            </div>
            @unless (count($categories) == 0)

                <table border="1" class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            {{-- checkbox row for multi delete purpose --}}
                            {{-- <td>
                            <input type="checkbox" name="chk_ids[]" id="chk_ids[]" value="" />
                        </td> --}}
                            {{-- end checkbox row for multi delete purpose --}}

                            <td>
                                <b>
                                    <p class="">
                                        {{ $category->id }}
                                    </p>
                                </b>
                            </td>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td>{{ date('D d-M-Y', strtotime($category->created_at)) }}</td>
                            <td>
                                <div id="action-list" style="display: flex; justify-content: space-evenly;">
                                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning btn-sm"">Edit</a>
                                    <form action="/categories/{{ $category->id }}" method="post">
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

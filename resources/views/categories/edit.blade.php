@extends('dashboard')
@section('title', 'Category | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <form action="/categories/{{ $category->id }}" method="post">
            @csrf
            {{ method_field('put') }}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Edit Category name</label>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <input type="text" class="form-control" id="exampleFormControlInput1"
                    value="{{ $category->category_name }}" placeholder="eg: type of product" name="category_name" />

                @error('category_name')
                    <div class="mt-2" style="color: red; font-size:14px;">{{ $message }} </div>
                @enderror
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
@endsection

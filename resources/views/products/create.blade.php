@extends('dashboard')
@section('title', 'Product | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('post') }}

                <div class="mb-3">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <label for="exampleFormControlInput1" class="form-label">Product name</label>
                    <input type="text" class="form-control" name="pname" id="exampleFormControlInput1"
                        placeholder="eg: Tesla model-s" value="{{ old('pname') }}">

                    @error('pname')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Describe your product...">{{ old('description') }}</textarea>
                    @error('description')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" name="price" class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)" value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="qty" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ old('qty') }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                    <select class="form-select form-control" name="supplier_id" aria-label="Default select example">
                        <option selected>Choose Supplier</option>

                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                    <select class="form-select form-control" name="category_id" aria-label="Default select example">
                        <option selected>Choose Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label for="picture">Product Picture</label>
                    <input type="file" name="picture" id="picture" class="form-control">

                    @error('picture')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Submit" class="btn btn-primary mb-4 btn-sm">

            </form>
        </div>
    </div>
@endsection

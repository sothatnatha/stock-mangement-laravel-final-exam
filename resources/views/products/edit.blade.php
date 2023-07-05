@extends('dashboard')
@section('title', 'Product | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            {{ method_field('put') }}

            <div class="mb-3">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <label for="exampleFormControlInput1" class="form-label">Product name</label>
                <input type="text" class="form-control" name="pname" id="exampleFormControlInput1"
                    placeholder="eg: Tesla model-s" value="{{ $product->pname }}">

                @error('name')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Describe your product...">{{ $product->description }}</textarea>
                @error('description')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" class="form-control"
                        aria-label="Dollar amount (with dot and two decimal places)" value="{{ $product->price }}">
                </div>
                @error('price')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="qty" id="exampleFormControlInput1"
                    placeholder="quantity" value="{{ $product->qty }}">
                @error('qty')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Suppliers</label>
                <select class="form-select form-control" name="supplier_id" aria-label="Default select example">
                    @foreach ($suppliers as $supplier)
                        @if ($supplier->id == $product->supplier_id)
                            <option value="{{ $supplier->id }}" selected>{{ $supplier->supplier_name }}</option>
                        @else
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                <select class="form-select form-control" name="category_id" aria-label="Default select example">
                    @foreach ($categories as $categorie)
                        @if ($categorie->id == $product->category_id)
                            <option value="{{ $categorie->id }}" selected>{{ $categorie->category_name }}</option>
                        @else
                            <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                        @endif
                    @endforeach

                </select>

            </div>
            <input type="submit" value="Update" class="btn btn-primary mb-4 btn-sm">

        </form>
    </div>
@endsection

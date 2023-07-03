@extends('dashboard')
@section('title', 'Product | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <form action="/products/create" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="eg: Tesla model-s">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Describe your product..."></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Quantity">

            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Choose Supplier</option>
                    <option value="s1">Supplier 1</option>
                    <option value="s2">Supplier 2</option>
                </select>

            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Choose Categories</option>
                    <option value="c1">Categories 1</option>
                    <option value="c2">Categories 2</option>
                </select>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>
@endsection

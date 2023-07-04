@extends('dashboard')
@section('title', 'Suppliers | Editing')

@section('right')
    <div class="container-fluid">
        <br>
        <form action="/suppliers/{{ $supplier->id }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Supplier name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                    placeholder="eg: apple store" value="{{ $supplier->name }}">

                @error('name')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact info</label>
                <input type="text" class="form-control" name="contact_info" id="exampleFormControlInput1"
                    placeholder="eg: telegram username or phone number" value="{{ $supplier->contact_info }}">

                @error('contact_info')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="exampleFormControlInput1"
                    placeholder="eg: street 261, phom penh" value="{{ $supplier->address }}">
                @error('address')
                    <p style="color: red; font-size:14px;"> {{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Update" class="btn btn-primary">

        </form>
    </div>
@endsection

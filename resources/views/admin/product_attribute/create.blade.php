@extends('admin.layouts.layout')
@section('admin_page_title')
Create Default Attribute
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Default Attribute</h5>
            </div>
            @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <label for="attribute_value" class="fw-bold md-2">Give me the Attribute Name</label>
                    <input type="text" class="form-control" name="attribute_value" placeholder="">
                    <button type="submit" class="btn btn-primary w-100">Add Attribute</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
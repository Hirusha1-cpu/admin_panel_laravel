@extends('admin.layouts.layout')
@section('admin_page_title')
Create Category Page
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Category</h5>
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
                <form action="{{route('store.cat')}}" method="POST">
                    @csrf
                    <label for="category_name" class="fw-bold md-2">Give me the category name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="">
                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
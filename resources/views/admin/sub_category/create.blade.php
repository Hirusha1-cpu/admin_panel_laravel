@extends('admin.layouts.layout')
@section('admin_page_title')
Create Sub Category Page
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Sub Category</h5>
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

                    <label for="subcategory_name" class="fw-bold md-2">Give me the category name</label>
                    <input type="text" class="form-control" name="subcategory_name" placeholder="">

                    <label for="category_id" class="fw-bold md-2">Give me the category name</label>
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
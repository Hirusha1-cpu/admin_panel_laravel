@extends('admin.layouts.layout')
@section('admin_page_title')
Edit Sub Category Page
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Sub Category</h5>
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
                <form action="{{route('update.subcat',$subcategory_info->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="subcategory_name" class="fw-bold md-2">Give me the sub-category name</label>
                    <input type="text" class="form-control" name="subcategory_name" placeholder=""
                    value="{{$subcategory_info->subcategory_name}}">
                    <button type="submit" class="btn btn-primary w-100">Update Sub-Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('admin.layouts.layout')
@section('admin_page_title')
Manage Category Page
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Category</h5>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="tabel">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->subcategory_name}}</td>
                                <td>
                                    <a href="{{route('show.subcat',$cat->id)}}" class="btn btn-info">Edit</a>
                                    <form action="{{route('delete.subcat',$cat->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="DELETE" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
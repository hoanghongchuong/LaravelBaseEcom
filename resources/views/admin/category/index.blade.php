@extends('admin.layouts.admin')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.partials.content_header', ['name' => 'Category', 'key' => 'List'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('categories.create')}}" class="btn btn-success float-right mb-2">Add Category</a>
                    </div>
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Created date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listCategory as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('categories.delete', $item->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$listCategory->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

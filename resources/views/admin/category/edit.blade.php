@extends('admin.layouts.admin')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content_header', ['name' => 'Category', 'key' => 'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form action="{{route('categories.update', $category->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select name="parent_id" id="" class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" value="{{$category->name}}" name="name">

                            </div>
                            <button class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

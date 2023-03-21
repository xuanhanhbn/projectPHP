@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('custom_css')
<style>
    ul{
        list-style: none;
    text-align: center;
    width: 100%;
    display: flex;
    justify-content: center;
    }
    ul>li{
        margin-left: 20px;
    }
    .icon-look{
        padding-top: 16px;
        margin-left: 20px;
    }
    .mr-20 {
        margin-right: 20px;
    }
    .mr-5 {
        margin-right: 5px;
    }
</style>

@endsection

@section('content')
@include('admin.layouts.navbars.auth.topnav', ['title' => 'List Category'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-sm-between">
                    <h3 class="card-title">List Category</h3>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Key</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->key}}</td>
                                <td><img width="75" src="{{$item->image}}" /></td>
                                <td>{{$item->description}}</td>
                                <td class="d-flex">
                                    <a href="{{url("admin/categories/edit",["categories"=>$item->id])}}" class="btn btn-outline-info mr-5">Edit</a>
                                    <form action="{{url("admin/categories/delete",["categories"=>$item->id])}}" method="post">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Chắc chắn xóa?');" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix d-flex">
                
                    <div class="col-md-4 d-flex">
                        <a class="btn btn-primary btn-sm ms-auto " href="{{url("admin/categories/create")}}">
                            <span class="ms-2">Create Categories</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.layouts.footers.auth.footer')
</div>
@endsection
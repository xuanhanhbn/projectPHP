@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'List Product'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-sm-between">
                        <h3 class="card-title">List Product</h3>
                        <div class="card-tools">
                            <form action="{{url("admin/product/list/")}}" method="get">
                                <div class="input-group input-group-sm mr-3" style="width: 150px;">
                                    <select class="form-control float-right" name="category_id">
                                        <option value="0">Choose category...</option>
                                        @foreach($categories as $item)
                                            <option @if(app("request")->input("category_id")==$item->id) selected @endif value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">

                                </div>
                                <div class="input-group input-group-sm">
                                    <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Sold</th>
                                <th>Category Id</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img width="75" src="{{$item->thumbnail}}" /></td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->in_stock}}</td>
                                    <td>{{$item->sold}}</td>
                                    <td>{{$item->Category->title}}</td>
                                    <td>
                                        <a href="{{url("admin/product/edit",["product"=>$item->id])}}" class="btn btn-outline-primary">Edit</a>
                                        <form action="{{url("admin/product/delete",["product"=>$item->id])}}"
                                              method="post">
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
                        <div class="col-md-8">
                            {!! $data->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                        <div class="col-md-4 d-flex">
                            <a class="btn btn-primary btn-sm ms-auto " href="{{url("admin/product/create")}}">
                                <span class="ms-2">Create Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection

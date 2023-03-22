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
@include('admin.layouts.navbars.auth.topnav', ['title' => 'List Order'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-sm-between">
                    <h3 class="card-title">List Order</h3>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Address</th>
                                <th>Receiver Contact</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->order_status}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->payment_type}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->shipping_address}}</td>
                                <td>{{$item->receiver_contact}}</td>
                                <td class="d-flex">
                                    <a href="{{url("admin/order/edit",["order"=>$item->id])}}" class="btn btn-outline-info mr-5">Edit</a>
                                    <!-- <form action="{{url("admin/order/delete",["order"=>$item->id])}}" method="post">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Chắc chắn xóa?');" class="btn btn-outline-danger">Delete</button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer clearfix d-flex"> -->
                
                    <!-- <div class="col-md-4 d-flex">
                        <a class="btn btn-primary btn-sm ms-auto " href="{{url("admin/categories/create")}}">
                            <span class="ms-2">Create Categories</span>
                        </a>
                    </div> -->
                <!-- </div> -->
            </div>
        </div>

    </div>
    @include('admin.layouts.footers.auth.footer')
</div>
@endsection
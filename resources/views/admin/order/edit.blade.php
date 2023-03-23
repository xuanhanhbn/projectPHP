@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection
@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Edit Order'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Order</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/order/edit', ['order' => $order->id]) }}"
                            role="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>OrderStatus</label>
                                    <input class="form-control" type="text" value="{{ $order->order_status }}"
                                        name="order_status" placeholder="Total..." disabled>
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input class="form-control" type="text" value="{{ $order->total }}" name="total"
                                        placeholder="Total..." disabled>
                                </div>

                                <div class="form-group">
                                    <label>Payment Type</label>
                                    <input class="form-control" type="text" value="{{ $order->payment_type }}"
                                        name="payment_type" placeholder="payment_type..." disabled>
                                </div>

                                <div class="form-group">
                                    <label>Payment Status</label>
                                    <input class="form-control" type="text" value="{{ $order->payment_status }}"
                                        name="payment_status" placeholder="payment_status..." disabled>
                                </div>

                                <div class="form-group">
                                    <label>Shipping Address</label>
                                    <input class="form-control" type="text" value="{{ $order->shipping_address }}"
                                        name="shipping_address" placeholder="shipping_address}..." disabled>
                                </div>

                                <div class="form-group">
                                    <label>Receiver Phone</label>
                                    <input class="form-control" type="text" value="{{ $order->receiver_phone }}"
                                        name="receiver_phone" placeholder="receiver_phone}..." disabled>
                                </div>
                                <div class="form-group">
                                    <label>Receiver Name</label>
                                    <input class="form-control" type="text" value="{{ $order->receiver_name }}"
                                        name="receiver_name" placeholder="receiver_name}..." disabled>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-between">
                                <div>
                                    <a class="btn btn-primary  " href="{{ url('admin/order/list') }}">Back</a>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">Edit</button> --}}
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection
@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    </script>
@endsection

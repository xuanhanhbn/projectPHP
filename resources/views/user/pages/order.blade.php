@extends('user.layouts.app')
@section('custom_css')
    <style>
        .order-info h3 {
            font-weight: 600;
        }

        .order-info h5 {
            font-weight: 600;
        }

        .order-info span {
            font-weight: 300;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <!-- Breadcrumb Section Begin -->
        <!-- ***** Main Banner Area End ***** -->
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="row" style="flex-direction: row">
                        <div class="col-lg-6 order-info">
                            <h3 style="margin-top: 30px">Order #<span>{{ $order->id }}</span></h3>
                            <h5 style="margin-top: 20px">Shipping address:
                                <span>{{ $order->shipping_address }}</span>
                            </h5>
                            <h5 style="margin-top: 20px">Receiver Name:
                                <span>{{ $order->receiver_name }}</span>
                            </h5>
                            <h5 style="margin-top: 20px">Receiver phone:
                                <span>{{ $order->receiver_phone }}</span>
                            </h5>
                            <h5 style="margin-top: 20px">Order time: <span>{{ $order->created_at }}</span>
                            </h5>
                        </div>
                        <div class="col-lg-6 order-info"
                            style="display: flex; flex-direction: column; gap: 10px; background: #f5f5f5; padding: 30px; margin-bottom: 50px;">
                            <h3>Total (USD): {{ number_format($order->total, 0) }}</h3>
                            <h5>Order status: <div
                                    style="
                                        display: inline-block;
                                        font-weight: 500;
                                        padding: 5px 10px;
                                        border-radius: 20px;
                                        background-color:{{ $order->order_status == 'Succeed' ? 'lightgreen' : 'yellow' }}">
                                    {{ $order->order_status }}</div>
                            </h5>
                            <h5>Payment method: {{ $order->payment_type }}</h5>
                            <h5>Payment status:
                                <div
                                    style="
                                            display: inline-block;
                                            font-weight: 500;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            background-color:{{ $order->payment_status ? 'lightgreen' : 'yellow' }}">
                                    {{ $order->payment_status ? 'Succeeded' : 'Pending' }}</div>
                                <a href="{{ route('processTransaction', ['order' => $order->id]) }}"
                                    @if ($order->payment_type != 'Paypal' || $order->payment_status) style="display: none;" @endif>Retry</a>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        @if ($order->order_status == 'Succeed')
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->SubOrder as $subOrder)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $subOrder->Product->thumbnail }}" alt=""
                                                    width="75" height="75">
                                                <h5>{{ $subOrder->Product ? $subOrder->Product['title'] : '' }}</h5>
                                            </td>
                                            <td class="shoping__cart__price" id="price">
                                                {{ number_format($subOrder->Product ? $subOrder->Product['price'] : 0, 0) }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                {{ $subOrder->quantity }}
                                            </td>
                                            <td class="shoping__cart__total" id="subtotal_{{ $subOrder->id }}">
                                                {{ number_format($subOrder->Product ? $subOrder->Product['price'] * $subOrder->quantity : 0, 0) }}
                                            </td>
                                            @if ($order->order_status == 'Succeed')
                                                <td>
                                                    <button type="button" class="btn btn-link" data-toggle="modal"
                                                        data-target="#exampleModalCenter" style="color: #000">
                                                        <i class="fa fa-commenting" aria-hidden="true"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form>
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                                            Leave a rating</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="display: flex; flex-direction: column;">
                                                                        <textarea name="comment" id="" cols="50" rows="5" style="flex: 1; padding: 10px;"></textarea>
                                                                        <div class="rate">
                                                                            <input type="radio" id="star5"
                                                                                name="rate" value="5" />
                                                                            <label for="star5" title="text">5
                                                                                stars</label>
                                                                            <input type="radio" id="star4"
                                                                                name="rate" value="4" />
                                                                            <label for="star4" title="text">4
                                                                                stars</label>
                                                                            <input type="radio" id="star3"
                                                                                name="rate" value="3" />
                                                                            <label for="star3" title="text">3
                                                                                stars</label>
                                                                            <input type="radio" id="star2"
                                                                                name="rate" value="2" />
                                                                            <label for="star2" title="text">2
                                                                                stars</label>
                                                                            <input type="radio" id="star1"
                                                                                name="rate" value="1" />
                                                                            <label for="star1" title="text">1
                                                                                star</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn"
                                                                            data-dismiss="modal">Cancle</button>
                                                                        <button type="submit" formaction="{{route("product.comment",["product_id" => $subOrder->Product->id])}}" formmethod="POST"
                                                                            class="btn btn-secondary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form>
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    @if ($order->order_status != 'Succeed' && ($order->payment_type != 'Paypal' || $order->payment_status))
                        <button style=" background: #fff; color: #000; padding: 10px 20px;float: right"
                            formaction="{{ route('user_order.completed') }}" formmethod="POST">Shipment
                            received!</button>
                    @endif
                </form>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @endsection

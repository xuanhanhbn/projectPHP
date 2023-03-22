@extends('user.layouts.app')
@section('content')
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->




    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">

        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section">
        <div class="container">
            <h1>Order Information</h1>
            <form>
                @csrf
                <div class="row p-5" style="flex-direction: row">
                    <div class="col-lg-7">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: row; gap: 20px;">
                            <button class="primary-btn btn-dark" id="checkoutBtn" type="submit"
                                formaction="{{ route('transaction') }}" formmethod="POST"
                                style=" background: #0a0c0d;border: none; opacity: @if ($total <= 0) 0.5 @else 1 @endif"
                                @if ($total <= 0) disabled @endif>PROCEED
                            </button>
                            <select name="payment_method">
                                <option value="Cod">Cash on Delivery</option>
                                <option value="Paypal">Pay by Paypal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 p-5" style="border: 3px solid">
                        <div class="">
                            <p class="font-weight-bold h3 text-dark">YOUR ORDER</p>
                            <div class="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">PRODUCTS</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $product)
                                            <tr>
                                                <td>{{ $product->Product ? $product->Product['title'] : '' }}
                                                    <span class="font-weight-bold">x {{ $product->quantity }}</span>
                                                </td>  
                                                <td>{{ number_format($product->Product ? $product->Product['price'] * $product->quantity : 0, 0) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr style="border-bottom: 3px solid">
                                            <input type="hidden" name="total" value="{{$total}}">
                                            <th>Cart Total (USD)</th>
                                            <td name="total">{{ number_format($total, 0) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

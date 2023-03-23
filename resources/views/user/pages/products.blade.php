@extends('user.layouts.app')
@section('custom_js')
    <script>
        $('#search').keypress(function(e) {
            if (e.keyCode == 13) {
                $('#searchForm').submit();
            }
        });
        $('.filter').change(function(e) {
            $('#searchForm').submit();
        });
    </script>
@endsection
@section('custom_css')
    <style>
        #search:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        #filter-container {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        #filter-container .nice-select {
            border: none;
        }

        select:has(option:disabled:checked[hidden]) {
            color: gray;
        }
    </style>
@endsection
@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    {{-- @include('user.layouts.navbars.guest.topnav') --}}
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top" style="background-image: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
                <div class="col-lg-6 nav">
                    <form role="form" method="GET" action={{ route('user_product-listing') }} id="searchForm"
                        enctype="multipart/form-data"
                        style="display: flex; flex-direction: column; align-items: flex-end; width: 100%">
                        <div class="search scroll-to-section">
                            <input class="form-control" type="text" placeholder="Search" id="search" name="key"
                                value="{{ $key ? $key : null }}">
                            <button type="submit" style="border: none"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div id="filter-container">
                            <select name="recipient" id="recipient" class="filter">
                                <option @if ($recipientFilter == null) selected @endif disabled hidden>Recipient</option>
                                <option value="">--None--</option>
                                @foreach ($recipient as $r)
                                    <option @if ($recipientFilter == $r->key) selected @endif value="{{ $r->key }}">
                                        {{ $r->title }}</option>
                                @endforeach
                            </select>
                            <select name="category" id="category" class="filter">
                                <option @if ($categoryFilter == null) selected @endif disabled hidden>Category</option>
                                <option value="">--None--</option>
                                @foreach ($category as $c)
                                    <option @if ($categoryFilter == $c->key) selected @endif value="{{ $c->key }}">
                                        {{ $c->title }}</option>
                                @endforeach
                            </select>
                            <select name="price" id="price" class="filter">
                                <option @if ($categoryFilter == null) selected @endif disabled hidden>Price</option>
                                <option value="">--None--</option>
                                <option @if ($priceFilter == '< 20') selected @endif value="< 20">
                                    < 20 USD</option>
                                <option @if ($priceFilter == 'between 20 and 50') selected @endif value="between 20 and 50">
                                    20 - 50 USD</option>
                                <option @if ($priceFilter == 'between 50 and 80') selected @endif value="between 50 and 80">
                                    50 - 80 USD</option>
                                <option @if ($priceFilter == 'between 80 and 100') selected @endif
                                    value="between 80 and 100">
                                    80 - 100 USD</option>
                                <option @if ($priceFilter == '> 100') selected @endif value="> 100">
                                    > 100 USD</option>
                            </select>
                            <select name="order" id="order" class="filter">
                                <option @if ($orderFilter == 'ASC' || $orderFilter == null) selected @endif value="ASC">ASC</option>
                                <option @if ($orderFilter == 'DESC') selected @endif value="DESC">DESC</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4">
                        <a href="{{ route('user_product-single', ['id' => $item->id]) }}">
                            <div class="item">
                                <div class="thumb">
                                    <img width="100%" src="{{ $item->thumbnail }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $item->title }}</h4>
                                    <span>USD {{ number_format($item->price, 0) }}</span>
                                    <ul class="stars">
                                        <?php
                                        echo str_repeat('<li><i class="fa fa-star"></i></li>', $item->rating);
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    {!! $data->appends(Request::except('page'))->links() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection

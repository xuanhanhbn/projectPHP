@extends('user.layouts.app')
@section("content")
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
        <div class="sub-body">
            <div class="header-pay">
                <h1 class="price"><span class="price__dollar">$</span>15.00<span class="price__time">/ mo</span></h1>
                
            </div>

            <div class="pay-select">
                <div class="pay-select__item pay-select--card is-active">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/346994/Card%20Icon.svg" alt="" />
                    <p>Debit/Credit Card</p>
                </div>

                <div class="separator"></div>

                <div class="pay-select__item pay-select--paypal">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/346994/Pp%20Icon.svg" alt="" />
                    <p>PayPal</p>
                </div>
            </div>

            <div class="select-body">
                <div class="select-body__content select-body--card is-active">
                    <form action="/" method="post" id="cardForm">

                        <label class="form__label" for="card-number">Card Number</label>
                        <div class="card-input" id="card-number"></div>

                        <label class="form__label" for="expiration-month">Expiration Date</label>
                        <div class="date__container">
                            <div class="card-input" id="expiration-month"></div>

                            <div class="card-input" id="expiration-year"></div>
                        </div>

                        <label class="form__label" for="cvv">CVV</label>
                        <div class="card-input" id="cvv"></div>

                        <label class="form__label" for="cvv">Billing Zip Code</label>
                        <div class="card-input" id="postal-code"></div>

                        <input type="submit" value="Subscribe" id="submit" />
                    </form>
                </div>

                <div class="select-body__content select-body--paypal">
                    <script src="https://www.paypalobjects.com/api/button.js?" data-merchant="braintree" data-id="paypal-button" data-button="subscribe" data-color="gold" data-size="medium" data-shape="pill" data-button_type="submit" data-button_disabled="false"></script>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
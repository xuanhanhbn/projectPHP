@extends('user.layouts.app')
@section("content")


<!-- ***** Header Area Start ***** -->
{{-- @include('user.layouts.navbars.guest.topnav') --}}
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading about-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Contact Us</h2>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Contact Area Starts ***** -->
<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0970740567045!2d105.78010051485438!3d21.02880148599837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b32b842a37%3A0xe91a56573e7f9a11!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1678206681956!5m2!1svi!2s" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->

                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Say Hello. Don't Be Shy!</h2>
                    <span>Have a nice day! ❤️
                </div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form id="contact" action="{{ route('send-mail') }}" method="post">
                    @csrf   
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="subject" rows="6" id="message" placeholder="Your message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ***** Contact Area Ends ***** -->

<!-- ***** Subscribe Area Starts ***** -->
<!-- ***** Subscribe Area Ends ***** -->


@endsection
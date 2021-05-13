@extends('layouts.frontend.header')

@section('title')
Car Judge - Contact With Us Anytime
@endsection

@section('content')

<!---- contact part start--->

<section class="contact">

    <div class="container py-5">


        <!---section title--->
        <div class="row mb-5">
            <div class="col d-flex flex-wrap justify-content-center">
              <h1 class="font-weight-bold align-self-center mx-1 texting">Contact</h1>
              <h1 class="section-title-special mx-1 texting">Us</h1>
            </div>
        </div>

        <!---left call section--->
        <div class="row contact-page">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-lg-5 col-sm-12 col-xs-12">
                        <div class="call-contact">
                            <span class="call"><i class="fas fa-headset call-font-color"></i>Call Us</span>
                            <div class="call-number">
                                <a style="text-decoration:none;color:black;" href="callto:+8801729843857">
                                    0172-9843857
                                </a>
                            </div>

                            <p class="contact-time">
                                (Mon to Sat 9:30 AM to 6 PM)
                            </p>
                        </div>
                        <div class="call-contact mail-contact">
                            <span class="call"><i class="fas fa-envelope-open-text call-font-color"></i>E-Mail</span>
                            <div class="email-link">
                                <a href="mailto:carjudge7@gmail.com" title="support@cardekho.com">carjudge7@gmail.com</a>
                            </div>
                        </div>
                        <br>
                        <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.7884187014797!2d90.37417781429704!3d23.754923294522023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ada2664e21%3A0x3c872fd17bc11ddb!2sCSE%20Building%2C%20Daffodil%20International%20University!5e0!3m2!1sen!2sbd!4v1595072709402!5m2!1sen!2sbd"
                          width="350" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <br><br><br>
                    </div>



                    <!---right call section--->
                    <div class="col-md-12 col-lg-7 col-sm-12 col-xs-12">


                    <div class="row my-3">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto mb-4">

                            <div class="contact-title">
                                <p>Let Us Contact You</p>
                            </div>
                            {{--{{ route('contact.store') }}--}}
                            <form method="post" action="{{ url('/contacts') }}">
                                @csrf
                                <div class="input-group input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input name="name" id="name" type="text" class="form-control form-control-lg  text-size {{ $errors->has('name') ? 'error' : '' }}" placeholder="Enter Name">

                                </div>

                                <!--- Error -->
                                @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto mb-4">
                            <div class="input-group input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input name="email" id="email" type="email" class="form-control form-control-lg text-size {{ $errors->has('email') ? 'error' : '' }}" placeholder="Enter Mail">

                            </div>
                            @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>


                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto mb-4">
                            <div class="input-group input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone-square-alt"></i>
                                </div>
                                <input name="phone" id="phone" type="text" class="form-control form-control-lg text-size {{ $errors->has('phone') ? 'error' : '' }}" placeholder="Phone Number">

                            </div>
                            @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto mb-4">
                            <div class="input-group input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <input name="subject" id="subject" type="text" class="form-control form-control-lg text-size {{ $errors->has('subject') ? 'error' : '' }}" placeholder="Subject">

                            </div>
                            @if ($errors->has('subject'))
                            <div class="error">
                                {{ $errors->first('subject') }}
                            </div>
                            @endif
                        </div>



                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto mb-4">
                            <div class="input-group input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-paragraph"></i>
                                </div>
                                <textarea name="message" id="message" rows="3" class="form-control form-control-lg text-size {{ $errors->has('message') ? 'error' : '' }}" placeholder="Enter message here"></textarea>
                            </div>
                            @if ($errors->has('message'))
                            <div class="error">
                                {{ $errors->first('message') }}
                            </div>
                            @endif
                        </div>
                    </div>



                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mx-auto">
                        <input type="submit" value="SUBMIT" name="send" class="btn btn-success btn-block">
                    </div>
                </div>


                </div>
            </div>

            </form>

        </div>
    </div>
    </div>

    <!---- contact part end--->


</section>



@endsection

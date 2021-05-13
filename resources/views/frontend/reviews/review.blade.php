@extends('layouts.frontend.header')

@section('title')
Car Judge - {{ $singlecar->car_model }} For Post Review
@endsection

@section('content')

<style media="screen">
    .star-rating {
        font-size: 1.25em;
        cursor: pointer;
    }

    .star-rating .fa-star {
        color: var(--mainBlue);
    }
</style>




{{--- review heading--}}
<br><br>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 mr-auto">
            <h1>Write a Review for a {{ $singlecar->car_model }}</h1>
            <h6>Your review could help car shoppers who are looking for the right car. </h6>

            <br><br>
            <hr class=ghap-review>
            <br>



                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type of Review</label>
                    <br>
  <form action="{{ URL::to('/carsdetails/process-reviews') }}" method="post">
                           @csrf
            <input type="hidden" value="{{ $singlecar->id }}" name="car_id">


                    <select class="form-control text-size" name="type">
                        <option>Choose One</option>
                        <option value="exam">After examination drove</option>
                        <option value="current">I currently purchase it</option>
                        <option value="enjoy">I still enjoy this car</option>
                    </select>
                    <small>Reviews can be from current or previous owners and test drives</small>
                </div>


                <br>

                <hr class=ghap-review>


                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                        {{--overall rating---}}
                        <div class="rating-overall mt-3">
                            <p class="rating-head">Overall</p>

                            {{--rating starts part--}}
                            <div class="star-rating">
                                <span class="far fa-star o" data-overall="1" onclick="getOverall(1)"></span>
                                <span class="far fa-star o" data-overall="2" onclick="getOverall(2)"></span>
                                <span class="far fa-star o" data-overall="3" onclick="getOverall(3)"></span>
                                <span class="far fa-star o" data-overall="4" onclick="getOverall(4)"></span>
                                <span class="far fa-star o" data-overall="5" onclick="getOverall(5)"></span>
                            </div>

                            <input type="hidden" id="orating" name="orating">






                        </div>

                    </div>



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                        <div class="rating-comfort mt-3">
                            <p class="rating-head">Comfort</p>

                            <div class="star-rating">
                                <span class="far fa-star c" data-comfort="1" onclick="getComfort(1)"></span>
                                <span class="far fa-star c" data-comfort="2" onclick="getComfort(2)"></span>
                                <span class="far fa-star c" data-comfort="3" onclick="getComfort(3)"></span>
                                <span class="far fa-star c" data-comfort="4" onclick="getComfort(4)"></span>
                                <span class="far fa-star c" data-comfort="5" onclick="getComfort(5)"></span>
                            </div>
                            <input type="hidden" id="crating" name="crating">

                        </div>


                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">

                        <div class="rating-interior">
                            <p class="rating-head">Interior Design</p>
                            <div class="star-rating">
                                <span class="far fa-star i" data-interior="1" onclick="getInterior(1)"></span>
                                <span class="far fa-star i" data-interior="2" onclick="getInterior(2)"></span>
                                <span class="far fa-star i" data-interior="3" onclick="getInterior(3)"></span>
                                <span class="far fa-star i" data-interior="4" onclick="getInterior(4)"></span>
                                <span class="far fa-star i" data-interior="5" onclick="getInterior(5)"></span>
                            </div>
                            <input type="hidden" id="irating" name="irating">
                        </div>



                    </div>





                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">

                        <div class="rating-performance">
                            <p class="rating-head">Performance</p>
                            <div class="star-rating">
                                <span class="far fa-star p" data-perform="1" onclick="getPerform(1)"></span>
                                <span class="far fa-star p" data-perform="2" onclick="getPerform(2)"></span>
                                <span class="far fa-star p" data-perform="3" onclick="getPerform(3)"></span>
                                <span class="far fa-star p" data-perform="4" onclick="getPerform(4)"></span>
                                <span class="far fa-star p" data-perform="5" onclick="getPerform(5)"></span>
                            </div>
                            <input type="hidden" id="prating" name="prating">
                        </div>

                    </div>


                </div>




                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">

                        <div class="rating-money">
                            <p class="rating-head">Value for the Money</p>
                            <div class="star-rating">
                                <span class="far fa-star m" data-money="1" onclick="getMoney(1)"></span>
                                <span class="far fa-star m" data-money="2" onclick="getMoney(2)"></span>
                                <span class="far fa-star m" data-money="3" onclick="getMoney(3)"></span>
                                <span class="far fa-star m" data-money="4" onclick="getMoney(4)"></span>
                                <span class="far fa-star m" data-money="5" onclick="getMoney(5)"></span>
                            </div>
                            <input type="hidden" id="mrating" name="mrating">
                        </div>


                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-5">
                        <div class="rating-reliability">
                            <p class="rating-head">Reliability</p>
                            <div class="star-rating">
                                <span class="far fa-star r" data-reliable="1" onclick="getReliability(1)"></span>
                                <span class="far fa-star r" data-reliable="2" onclick="getReliability(2)"></span>
                                <span class="far fa-star r" data-reliable="3" onclick="getReliability(3)"></span>
                                <span class="far fa-star r" data-reliable="4" onclick="getReliability(4)"></span>
                                <span class="far fa-star r" data-reliable="5" onclick="getReliability(5)"></span>
                            </div>

                            <input type="hidden" id="rrating" name="rrating">

                        </div>


                    </div>


                </div>

                {{--rating end part--}}

                <script type="text/javascript">

                </script>


                <hr class=ghap-review>


                {{--heading and text part---}}
                <div class="row">
                        {{--submiting area--}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-auto py-3">
                            <label>Heading</label>
                            <input type="text" class="form-control text-size" name="heading" placeholder="Exp:'This is most reliable car to me.'">
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-auto py-3">
                            <label>What do you think of this vehicle?</label>
                            <textarea name="message" rows="5" class="form-control text-size" placeholder="Exp: The ride is great compared to other cars. I test this car that was awesome to me. Also, this is suitable as a family car. "
                            ></textarea>
                        </div>

                </div>

                <hr class=ghap-review>


                <div class="row">

                    {{--submiting area--}}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-auto py-3">
                        <label>Screen Name</label>
                        <input type="text" class="form-control text-size" name="name" placeholder="Exp:'KamalAZ';'AbirSh'.." >
                        <small>This shows the review has an author.</small>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-auto py-3">
                        <label>City,State</label>
                        <input type="text" class="form-control text-size" name="city" placeholder="Exp:'Dhaka';'Faridpur'.." >
                        <small>Know where you run the car perspective.</small>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control text-size" >
                        <small>Your email will NOT appear in the review.</small>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
                        <button type="submit" class="btn btn-primary">Sumbit Your Review</button>
                        <small>We will save your valuable review</small>
                    </div>


                </div>

            </form>



            <script type="text/javascript">
                function getOverall(overall) {
                    $(".o").each(function() {
                        document.getElementById('orating').value = overall;
                        var orating = $(this).data('overall');
                        if (orating <= overall) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>



            <script type="text/javascript">
                function getComfort(comfort) {
                    $(".c").each(function() {
                        document.getElementById('crating').value = comfort;
                        var crating = $(this).data('comfort');
                        if (crating <= comfort) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>


            <script type="text/javascript">
                function getInterior(interior) {
                    $(".i").each(function() {
                        document.getElementById('irating').value = interior;
                        var irating = $(this).data('interior');
                        if (irating <= interior) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>


            <script type="text/javascript">
                function getPerform(perform) {
                    $(".p").each(function() {
                        document.getElementById('prating').value = perform;
                        var prating = $(this).data('perform');
                        if (prating <= perform) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>



            <script type="text/javascript">
                function getMoney(money) {
                    $(".m").each(function() {
                        document.getElementById('mrating').value = money;
                        var mrating = $(this).data('money');
                        if (mrating <= money) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>

            <script type="text/javascript">
                function getReliability(reliable) {
                    $(".r").each(function() {
                        document.getElementById('rrating').value = reliable;
                        var rrating = $(this).data('reliable');
                        if (rrating <= reliable) {
                            $(this).removeClass('far').addClass('fas');
                        } else {
                            $(this).removeClass('fas').addClass('far');
                        }
                    });
                }
            </script>

        </div>
    </div>

</div>



@endsection

@extends("site.app")
@section("title")
    {{__('home.title')}}
@endsection

@section("css")
    <style type="text/css">
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section("content")

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="item active"
                     style="background-image: url({{ asset('https://i.imgur.com/sRI08X3.png') }});">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"
                                        style="color: #000; font-family: -webkit-pictograph; line-height: 1.5;">
                                        {{__('home.text1Acomplete')}}</h1>
                                        <img src="https://sala.uxper.co/wp-content/uploads/2021/10/fill-36.svg" >
                                    <h2 class="animation animated-item-2"
                                        style="margin: 18px 0; font-weight: 400; color: #000; font-family: system-ui;">{{__('home.trustText')}} {{ $setting->main_name }}</h2>
                                    <form id="sign-up-form-1" method="post"
                                          class="form-inline animation animated-item-3" action="{{ route("signup") }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control input-lg"
                                                   required="required" placeholder="{{__('home.YourEmailID')}}" style="border-radius: 41px; width: 108%;"/>
                                        </div>
                                        <input type="submit" name="submit" class="input-lg btn btn-primary"
                                               value="Try for FREE!" style="border-radius: 38px; position: relative; right: 19px;"/>
                                    </form>
                                    <h2 class="animation animated-item-2"{{__('home.noCreditCard')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
    
    <section id="feature" style="background: #fff;">
   <div class="container">

      <div class="row" align="center">
         <div class="features">
            <div class="col-md-4 col-sm-12 wow fadeInDown animated animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
               <div class="feature-wrap">
                  <i class="fa fa-headphones"></i>
                  <h2 style="color: #000">Liver Support</h2>
                  <h3>Our team is always ready for live support.</h3>
               </div>
            </div>
            <!--/.col-md-4-->
            <div class="col-md-4 col-sm-12 wow fadeInDown animated animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
               <div class="feature-wrap">
                  <i class="fa fa-bolt"></i>
                  <h2 style="color: #000">Simple & fast</h2>
                  <h3>Manageing your companys & employees in easy and fast way.</h3>
               </div>
            </div>
            <!--/.col-md-4-->
            <div class="col-md-4 col-sm-12 wow fadeInDown animated animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
               <div class="feature-wrap">
                  <i class="fa fa-lock"></i>
                  <h2 style="color: #000">Secure</h2>
                  <h3>Secure payment option. Pay via paypal and stripe</h3>
               </div>
            </div>

         </div>
         <!--/.services-->
      </div>
      <!--/.row-->
   </div>
   <!--/.container-->
</section>
    <section id="main-slider" class="no-margin" style="background: cornsilk; display: none" align="center"><br>
        <img src="https://i.imgur.com/EbsfwhK.png" style="width: 350px">
        <div class="carousel slide">
            <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><h2 class="text-dark" style="color: #000; font-family: math">Best Online HRM System</h2><span style="font-size: 20px;">#No 1 HRM soluation for your company.</span></div>
        </div>
    </section>
    <br>
    <section id="main-slider" class="no-margin" style="background: #fff;" align="center">
        <div class="row">
            <div class="container">
                <div class="col-md-6 col-sm-12">
                        <div align="left">
                            <h2 style="font-family: -webkit-pictograph; color: #000;font-size: 35px;margin: 0;">Why HRMme is Best ?</h2>
                            <img src="https://sala.uxper.co/wp-content/uploads/2021/10/fill-36.svg" >
                        </div><br>
                        
                        <div class="faq" id="accordion">
                            <div class="card">
                                <div class="card-header" id="faqHeading-1">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                            <span class="badge" style="left: 0px;top: 0px">1</span><span class="_span_88">How to start HRMme?</span>
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Using HRMme is very simple. Just create a free account and start managing your company.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-2">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                            <span class="badge" style="left: 0px;top: 0px">2</span><span class="_span_88"> How do I subscribe HRMme?</span>
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We support PayPal and stripe payment gateway, Which is the world's most recognized payment method.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqHeading-3">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                            <span class="badge" style="left: 0px;top: 0px">3</span><span class="_span_88">is HRMme is secure?</span>
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, HRMme is the most secure system. We are using SSL, So your data is encrypted during transport.</p>
                                    </div>
                                </div>
                            </div>
                        </div>





                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="center">
                        <iframe class="_videoFream" src="https://www.youtube.com/embed/RGaIQVVyGag" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
<style>
._span_88{position: relative; top: 8px;}
._videoFream {
    width: 100%;
    height: 315px;
    /* box-shadow: 0 2px 6px rgb(0 0 0 / 15%) !important; */
    border-radius: 25px;
    box-shadow: 0 18px 40px rgb(51 51 51 / 20%);
}

.faq-section {
    background: #fdfdfd;
    min-height: 100vh;
    padding: 10vh 0 0;
}
.faq-title h2 {
  position: relative;
  margin-bottom: 45px;
  display: inline-block;
  font-weight: 600;
  line-height: 1;
}
.faq-title h2::before {
    content: "";
    position: absolute;
    left: 50%;
    width: 60px;
    height: 2px;
    background: #E91E63;
    bottom: -25px;
    margin-left: -30px;
}
.faq-title p {
  padding: 0 190px;
  margin-bottom: 10px;
}

.faq {
  background: #FFFFFF;
  
  border-radius: 4px;
}

.faq .card {
background: none;
border: 2px dashed #CEE1F8;
margin-top: 10px;
}

.faq .card .card-header {
  padding: 0px;
  border: none;
  background: none;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

.faq .card .card-header:hover {
    background: rgba(233, 30, 99, 0.1);
    padding-left: 10px;
}
.faq .card .card-header .faq-title {
    width: 100%;
    text-align: left;
    padding: 0px;
    padding-left: 30px;
    padding-right: 30px;
    font-weight: 400;
    font-size: 15px;
    letter-spacing: 1px;
    color: #3B566E;
    text-decoration: none !important;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    padding-top: 14px;
    padding-bottom: 30px;
}

.faq .card .card-header .faq-title .badge {
    display: inline-block;
    width: 35px;
    height: 35px;
    line-height: 17px;
    float: left;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
    text-align: center;
    background: #0057fc;
    color: #fff;
    font-size: 21px;
    margin-right: 20px;
    font-weight: bold;
    font-family: -webkit-pictograph;
}

.faq .card .card-body {
  padding: 30px;
  padding-left: 35px;
  padding-bottom: 16px;
  font-weight: 400;
  font-size: 16px;
  color: #6F8BA4;
  line-height: 28px;
  letter-spacing: 1px;
  border-top: 1px solid #F3F8FF;
}

.faq .card .card-body p {
  margin-bottom: 14px;
}

@media (max-width: 991px) {
  .faq {
    margin-bottom: 30px;
  }
  .faq .card .card-header .faq-title {
    line-height: 26px;
    margin-top: 10px;
  }
}
</style>
    <section id="feature" style="background: #f8fafc;">
        <div class="container">
            <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <h2 style="color: #000">Discover how your business can work smarter!</h2>
                <img src="https://sala.uxper.co/wp-content/uploads/2021/10/fill-36.svg" >
            </div>

            <div class="row" align="center">
                <div class="features">
                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/atence.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">Employee Attendance</h2>
                            <h3>Paperless onboarding process for an excellent first impression.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/2738435.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">Leave Management</h2>
                            <h3>Manage all your Employees monthly leaves.</h3>

                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/3113025.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">Awards</h2>
                            <h3>Keet motivating your Employees. Manage their Awards.</h3>
                        </div>
                    </div><!--/.col-md-4-->


                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/3772930.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">Expense</h2>
                            <h3>Calculate your Employee's monthly Expenses easily.</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/5067242.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">Holidays</h2>
                            <h3>Create yealy holiday calander and manage everything properly.</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                        <div class="feature-wrap">
                            <img src="https://hrmbuddy.com/uploads/icons/4586752.png" width="80" style="background: #fff;padding: 10px;border-radius: 50%;box-shadow: 0px 0px 8px -5px rgb(0 0 0 / 70%);">
                            <h2 style="color: #000">User Friendly</h2>
                            <h3>Awesome UI and user-friendly design.</h3>
                        </div>
                    </div>
                </div><!--/.services-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section>
@endsection

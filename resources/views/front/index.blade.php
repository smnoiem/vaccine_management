{{-- 
    @if(!auth()?->user())
        <div>
            <ul>
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
            </ul>
        </div>
        @else
        <div>
            @if (auth()->user()->registration)
            <a href="{{ route('front.registration.status') }}">Vaccine Status</a> <br>
            @else
            <a href="{{ route('front.registration.create') }}">Register</a> <br>
            @endif
            <a href="/vaccine-card">Download Vaccine Card</a> <br>
            <a href="/vaccine-certificate">Download Certificate</a> <br>
        </div>
    @endif 
--}}

@extends('layouts.frontend_app')

@section('title', 'Vaccine Management Home')
@section('app_content')

    <section id="hero_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row hero_card">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top_part">
                                        <div class="d-flex">
                                            <div class="" style="margin-right: 50px">
                                                <i class="fa fa-users usr_icon"></i>
                                            </div>
                                            <div class="align-self-center"><strong
                                                    style="font-size: 34px">ভ্যাকসিনের জন্য নিবন্ধন
                                                    করুন</strong></div>
                                        </div>
                                    </div>
                                    <div class="bottom_part text-center" style="margin-top: 50px">
                                        <h5>নিবন্ধনের সময় প্রয়োজন হবে</h5>
                                        <div class="items mt-3">
                                            <div class="d-flex justify-content-between">
                                                <div class="mx-3">
                                                    <h5><i class="fa fa-contact-card"></i></h5>
                                                    <h6>NID</h6>
                                                    <i class="fa fa-angle-right"></i>
                                                </div>
                                                <div class="mx-3">
                                                    <h5><i class="fa fa-phone"></i></h5>
                                                    <h6>PHONE</h6>
                                                    <i class="fa fa-angle-right"></i>
                                                </div>
                                                <div class="mx-3">
                                                    <h5><i class="fa fa-info-circle"></i></h5>
                                                    <h6>NID</h6>
                                                    <i class="fa fa-angle-right"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div>
                                        <h4><i class="fa-solid fa-circle-info mr-5 d-inline-block"></i>
                                            <div class="ml-5 d-inline">নিবন্ধন <span><a
                                                        href="{{ route('front.registration.status') }}">স্ট্যাটাস</a></span></div>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div>
                                        <h4> <i class="fa-solid fa-address-card mr-5 d-inline-block"></i>
                                            <div class="ml-3 d-inline">টিকা কার্ড
                                                সংগ্রহ</div>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div>
                                        <h4><i class="fa-solid fa-circle-info mr-5 d-inline-block"></i>
                                            টিকা সনদ সংগ্রহ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div>
                                        <h4> <span><i
                                                    class="fa-solid fa-circle-info mr-5 d-inline-block"></i></span><span
                                                class="ml-3"> সচরাচর
                                                জিজ্ঞাসা</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="center_section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4>121</h4>
                            <h6>হটলাইন</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4>123</h4>
                            <h6>জাতীয় কল সেন্টার</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4>963</h4>
                            <h6>স্বাস্থ্য বাতায়ন</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4>9999</h4>
                            <h6>আইইডিসিআর</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="fourth_section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <h3 class="mb-3 px-2" style="border-left: 5px solid yellow">কোভিড-১৯ করোনা ভ্যাকসিন
                                গ্রহণের প্রক্রিয়া</h3>
                            <div class="row mt-5">
                                <div class="col-md-4 text-center mb-2">
                                    <img src="{{ asset('img/img1.png') }}" alt="">
                                    <h4 class="my-3">অনলাইনে নিবন্ধন</h4>
                                    <p>প্রথমে এই পোর্টালের মাধ্যমে জাতীয় পরিচয়পত্র ও সঠিক মোবাইল নম্বর যাচাইপূর্বক
                                        অনলাইনে নিবন্ধন সম্পন্ন করবেন।</p>
                                </div>
                                <div class="col-md-4 text-center mb-2">
                                    <img src="{{ asset('img/img2.png') }}" alt="">
                                    <h4 class="my-3">SMS নোটিফিকেশন</h4>
                                    <p>অনলাইনে নিবন্ধন পরবর্তী তথ্য যাচাইপূর্বক পর্যায়ক্রমে টিকা প্রদানের তারিখ ও
                                        কেন্দ্রের নাম উল্লেখপূর্বক মুঠোফোনে খুদেবার্তা পাবেন।</p>
                                </div>
                                <div class="col-md-4 text-center mb-2">
                                    <img src="{{ asset('img/img3.png') }}" alt="">
                                    <h4 class="my-3">টিকা কেন্দ্রে টিকা গ্রহণ</h4>
                                    <p>মুঠোফোনে খুদেবার্তা প্রাপ্তি সাপেক্ষে টিকাকার্ড জাতীয় পরিচয়পত্র ও
                                        সম্মতিপত্রসহ
                                        নির্দিষ্ট তারিখে টিকাদান কেন্দ্রে স্ব-শরীরে উপস্থিত হয়ে কোভিড-১৯ টিকা গ্রহণ
                                        করবেন।</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="fifth_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h4 class="text-bold">অ্যাপ ডাউনলোড করুন</h4>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('img/playstore.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="fourth_section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <h3 class="mb-3 px-2" style="border-left: 5px solid yellow">মুজিব ১০০</h3>
                            <div class="row mt-5">
                                <div class="col-md-4 text-center mb-2">
                                    <img src="{{ asset('img/mujib.png') }}" alt="" class="w-100">
                                    <h4 class="my-3"><a href="">মুজিব ১০০ পোর্টাল</a></h4>
                                </div>
                                <div class="col-md-4 text-center mb-2 align-self-center">
                                    <img src="{{ asset('img/playstore.png') }}" alt="">
                                    <h4 class="my-3"><a href="">মুজিব ১০০ অ্যান্ড্রয়েড অ্যাপ</a></h4>
                                </div>
                                <div class="col-md-4 text-center mb-2 align-self-center">
                                    <img src="{{ asset('img/ios.png') }}" alt="">
                                    <h4 class="my-3"><a href="">মুজিব ১০০ আইওএস অ্যাপ</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@extends('auth.layouts.main')

@section('main-content')
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        @if(session('success'))
                            <div style="color: darkgreen">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('blocked'))
                            <div style="color: darkred">
                                {{ session('blocked') }}
                            </div>
                        @endif
                        <h4>Log in to continue</h4>
                        @if(session('failed'))
                            <div style="color: darkred">
                                {{ session('failed') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email *</label>
                                <input required type="email" name="email" class="form-control p_input"
                                    placeholder="johnsmith@gmail.com">
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input required type="password" name="password" class="form-control p_input"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                            </div>

                            <button type="submit" class="newsletter-inner btn">Login</button>

                            <p class="sign-up">Don't have an Account?<a
                                    href="{{ route('register') }}"> Sign Up</a></p>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
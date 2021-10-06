@extends('auth.layouts.main')

@section('main-content')
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Register</h4>
                            @if(session('failed'))
                                <div style="color: darkred">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            @foreach($errors as $error)
                                <div style="color: darkred">
                                    {{$error->message()}}
                                </div>
                            @endforeach
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input required type="text" name="first_name" class="form-control p_input" placeholder="John" max="255" pattern="[a-zA-Z0-9 ]+"
                                           oninvalid="setCustomValidity('Field should not contain special characters')"
                                           onchange="try{setCustomValidity('')}catch(e){}" >
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input required type="text" name="last_name" class="form-control p_input" placeholder="Smith" max="255" pattern="[a-zA-Z0-9 ]+"
                                           oninvalid="setCustomValidity('The name should not contain special characters')"
                                           onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control p_input" placeholder="johnsmith@gmail.com" max="255">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="password" name="password" class="form-control p_input" pattern=".{6,}"
                                           oninvalid="setCustomValidity('Password should contain at least 6 characters')"
                                           onchange="try{setCustomValidity('')}catch(e){}">
                                </div>

                                <button type="submit" class="newsletter-inner btn">Register</button>
                            </form>
                                <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

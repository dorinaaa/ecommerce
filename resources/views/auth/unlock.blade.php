@extends('auth.layouts.main')

@section('main-content')
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Unlock your account</h4>
                            @if(session('failed'))
                                <div style="color: darkred">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('unlock') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input required type="email" name="email" class="form-control p_input" placeholder="johnsmith@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label>Code *</label>
                                    <input required type="password" name="code" class="form-control p_input" pattern="[0-9]{5}"
                                           oninvalid="setCustomValidity('Code should contain only 5 digits')"
                                           onchange="try{setCustomValidity('')}catch(e){}">
                                </div>

                                <button type="submit" class="newsletter-inner btn">Unlock</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
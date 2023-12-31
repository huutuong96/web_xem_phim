@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    
@endsection

{{-- banner content --}}
@section('banner_content')
    
@endsection


{{-- main content --}}
@section('main_content')
    @include('FrontEnd.block.nav')
    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="input__item">
                                <input type="email" placeholder="Email address" name="email" value="{{old("email")}}">
                                <span class="icon_mail"></span>
                                
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                {{-- // --}}
                            <div class="input__item">
                                <input type="text" placeholder="Your Name"  name="name" value="{{old("name")}}">
                                <span class="icon_profile"></span>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- // --}}
                            <div class="input__item">
                                <input type="text" placeholder="Password"  name="password" value="{{old("password")}}">
                                <span class="icon_lock"></span>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- // --}}
                            <div class="input__item">
                                <input type="text" placeholder="1 more time in Password"  name="password_confirmation" value="{{old("password_confirmation")}}">
                                <span class="icon_lock"></span>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror
                            {{-- // --}}
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <h5>Already have an account? <a href="{{route('login')}}">Log In!</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Login With:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->
@endsection
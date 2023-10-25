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
    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        @error('error')
                            <h4 style="font-size: x-large; color: red; margin-bottom: 20px">{{ $message }}</h4>                        
                        @enderror
                        <h3>Login</h3>
                        <form action="{{route('login')}}" method="post">
                        @csrf 
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email" value="{{old("email")}}">
                                <span class="icon_mail"></span>
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input__item">
                                <input type="text" placeholder="Password" name="password" value="{{old("password")}}">
                                <span class="icon_lock"></span>
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span><br><br>
                            @enderror

                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="{{route('register')}}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection

@section('link_js')
    @if(session('msg'))
        <script>
            alert("Bạn phải đăng nhập trước khi bình luận")
        </script>
    @endif
@endsection

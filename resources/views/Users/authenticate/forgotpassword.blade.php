@extends('users.layout.authenticate')
@section('main_contentAuthenticate')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Forgot Password</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('users.authenticate.postforgotpassword') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        @error('email')
                        <div style="color: red">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <button type="submit" value="" class="btn float-right login_btn"> Đổi PW</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="{{ route('users.authenticate.register') }}">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('users.authenticate.login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

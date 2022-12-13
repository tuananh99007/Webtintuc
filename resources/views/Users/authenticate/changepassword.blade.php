@extends('users.layout.authenticate')
@section('main_contentAuthenticate')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Change Password</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('users.authenticate.postchangepassword') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                            @error('email')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password">
                            @error('password')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control"
                                   placeholder="xac nhan password" name="password_confirmation">
                            @error('password')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Gui" class="btn float-right login_btn">
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

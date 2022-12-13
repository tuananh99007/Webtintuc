<header id="header">
    <section id="BoxHeader" class="section_header">
        <div id="mainHeader" class="tmp-inner-header">
            <div class="set-type-scroll">
                <div class="container">
                    <div class="row align-items-center">
                        @if ($userLogin = Auth::guard('users')->user())
                            <div class="col-4">
                                <div class="btn-group" role="group">
                                    <ul>
                                        <li>Avatar<img src="{{ $userLogin->avatar }}" alt=""
                                                       style="height: 50px ">
                                        </li>
                                        <li>Name:{{ $userLogin->name }}</li>
                                        <li>Email:{{ $userLogin->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="col-4">
                                <div class="btn-group" role="group">
                                </div>
                            </div>
                        @endif

                        <div class="col-4 box-logo text-center">
                            <h1 class="m-0">
                                <p class="py-4 mb-0"><a class="logo-default" href="{{ route('users.home.index') }}">
                                        <img src="{{ asset('assets/users/images/logo.svg') }}" alt="Người đưa tin"> </a>
                                </p>
                            </h1>
                        </div>
                        <form type="GET" class="col-4 d-flex box-group-item align-items-center"
                              action="https://www.nguoiduatin.vn/search">
                            <div class="input-group"><input type="text" class="form-control" name="q"
                                                            placeholder="Nhập từ khoá..."
                                                            aria-label="Recipient&#39;s username"
                                                            aria-describedby="button-addon2" value="">
                                <button
                                    class="btn btn-outline-secondary" type="button"><i class="tmp-search"></i>
                                </button>
                            </div>
                            <div id="login-modal">
                                <div class="Toastify" style=""></div>
                                <div class="user-login ml-md-3">
                                    @if ($userLogin = Auth::guard('users')->user())
                                        <div class="btn-login d-flex align-items-center text-nowrap"><span
                                                class="fontSize13 d-none d-md-inline-block"><a
                                                    href="{{ route('users.authenticate.logout') }}">Đăng Xuất</a></span>
                                        </div>
                                    @else
                                        <div class="btn-login d-flex align-items-center text-nowrap"><span
                                                class="fontSize13 d-none d-md-inline-block"><a
                                                    href="{{ route('users.authenticate.login') }}">đăng nhập</a></span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="active_height_fix" style="height: 47px;"></div>
</header>

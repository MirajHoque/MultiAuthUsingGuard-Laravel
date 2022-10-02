@extends('admin.layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="">Sign in to the DihanShan Properties.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('backend/assets/images/profile-img.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{ url('/') }}">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="rounded-circle"
                                            height="34">
                                    </span>
                                </div>
                                {{-- <div>
                                    <a href="">Not Registered</a>
                                </div> --}}
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember
                                        me</label>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                                <div class="mt-4 text-center">
                                    {{-- @if (Route::has('password.request')) --}}
                                        <a href="" class="text-muted"><i
                                                class="mdi mdi-lock mr-1"></i>
                                            Forgot your password?</a>
                                    {{-- @endif --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        &copy;{{ date('Y') }}
                         DihanShan Properties . Crafted with <i class="mdi mdi-heart text-danger"></i> by
                        <a href="https://www.akaarit.com/" target="_blank"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

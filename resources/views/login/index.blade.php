@extends('layouts.loginRegist')

@section('container')



@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main class="form-signin w-100 m-auto">
    <section class="vh-100" style="background-image:url(images/bg_1.jpg);"">
                <div class=" container py-5 h-100">
        <div style="margin-top: 40px;" class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="images/about-1.jpg" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="/login" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0">Hotel Insitu Wikrama</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                    </h5>

                                    <div class="form-outline mb-4">
                                        <input style="border-radius: 1rem;" type="email" id="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" placeholder="name@example.com" required autofocus
                                            value="{{ old('email') }}">
                                        <label class="form-label" for="email">Email address</label>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4 form-password-toggle">
                                        <input style="border-radius: 1rem;" type="password" id="password"
                                            name="password" placeholder="Password" required
                                            class="form-control form-control-lg">
                                        <label class="form-label" for="password">Password</label>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button style="border-radius: 1rem;" class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                            href="/register" style="color: #393f81;">Register here</a></p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    {{-- <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

    <form action="/login" method="POST">
        @csrf

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                placeholder="name@example.com" required autofocus value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>

    <small class="d-block text-center mt-3">Belum Daftar? <a href="/register" class="text-decoration-none">Daftar
            Sekarang!</a></small> --}}
</main>


@endsection

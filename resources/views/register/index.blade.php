@extends('layouts.loginRegist')

@section('container')
<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    .card-registration .select-arrow {
    top: 13px;
    }
    button {
    font-family: monospace;
    background-color: #f3f7fe;
    color: #3b82f6;
    border: none;
    border-radius: 8px;
    width: 100%;
    height: 45px;
    transition: .3s;
    margin-top: 10px;
    }

button:hover {
    background-color: #3b82f6;
    box-shadow: 0 0 0 5px #3b83f65f;
    color: #fff;
    }
</style>


        <main class="form-registration w-100 m-auto">
            <section class="h-100" style="background-image:url(images/bg_1.jpg);">
                <div class="container py-5 h-100">
                    <div style="margin-top: 40px;" class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                            <img src="images/about-1.jpg"
                                alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">
                                <form action="/register" method="POST">
                                @csrf
                                    <h3 class="mb-5 text-uppercase">Registration form</h3>

                                    <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                        <input style="border-radius: 1rem;" type="text" name="nama" id="nama" 
                                        placeholder="nama" class="form-control form-control-lg @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                                        <label class="form-label" for="nama">Your Name</label>
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                        <input style="border-radius: 1rem;" type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" 
                                        placeholder="username" required value="{{ old('nama') }}"/>
                                        <label class="form-label" for="username">Username</label>
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                    <input style="border-radius: 1rem;" type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    placeholder="name@example.com" required value="{{ old('email') }}"/>
                                    <label class="form-label" for="email">Your Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                    <input style="border-radius: 1rem;" type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                    placeholder="Password" required/>
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="input-group" style="border-radius: 1rem;">
                                            <span class="input-group-text">Alamat</span>
                                            <textarea name="alamat" class="form-control @error('password') is-invalid @enderror"
                                                aria-label="With textarea" required></textarea>
                                        </div>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4" style="margin-left: 20px;">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                    </div>

                                    <center><button type="submit">Register</button></center>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login"
                                    class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>

{{-- <section class="vh-100 bg-image"
  style="background-image: url('images/bg_1.jpg');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="/register" method="POST">
                @csrf

                <div class="form-outline mb-4">
                    <input type="text" name="nama" id="nama" 
                    class="form-control form-control-lg rounded-top @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                    <label class="form-label" for="nama">Your Name</label>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" 
                    required value="{{ old('nama') }}"/>
                    <label class="form-label" for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                    placeholder="name@example.com" required value="{{ old('email') }}"/>
                    <label class="form-label" for="email">Your Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg rounded-bottom @error('password') is-invalid @enderror" 
                  placeholder="Password" required/>
                  <label class="form-label" for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <textarea name="alamat" class="form-control @error('password') is-invalid @enderror"
                            aria-label="With textarea" required></textarea>
                    </div>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

            {{-- <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>

            <form action="/register" method="POST">
                @csrf

                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" name="nama"
                        id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                    <label for="nama">Nama</label>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class=" form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                        name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <textarea name="alamat" class="form-control @error('password') is-invalid @enderror"
                            aria-label="With textarea" required></textarea>
                    </div>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
            </form>

            <small class="d-block text-center mt-3">Sudah Mendaftar? <a href="/login" class="text-decoration-none">Login
                    Sekarang!</a></small> --}}
        </main>


@endsection
@extends('layouts.register')

@section('content')

<div class="container-fluid p-md-2 p-0">
  <div class="container p-md-2 p-0">
    <div class="align-self-center align-content-center">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row justify-content-center">
            <div class="register-image-right col-lg-4 mt-lg-5"></div>
            <div class="col-lg-4 px-lg-1 px-sm-5 px-3">
              <div class="py-5">
                <!-- <main class="form-registration w-100 m-auto"> -->
                <h4 class="fw-bold mb-3 text-primary text-center">General Affair</h4>
                <form class="user" action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <!-- <label for="name">{{ __('Name') }}</label> -->
                    <input type="text" class="form-control-user form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                    
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <!-- <label for="email">{{ __('Email Address') }}</label> -->
                    <input type="email" class="form-control-user form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                      
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6 pr-md-1 mb-md-0 mb-3">
                      <!-- <label for="password">{{ __('Password') }}</label> -->
                      <div class="">
                        <input type="password" class="form-control-user form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Password" required autocomplete="new-password">
                        <i class="fa fa-eye me-3 register-eye" id="togglePassword"></i> 
                      </div>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    {{-- </div>
                    <div class="form-group"> --}}
                    <div class="col-md-6 pl-md-1 mb-md-0 mb-3">
                      <!-- <label for="password-confirm">{{ __('Confirm Password') }}</label> -->
                      <input type="password" class="form-control-user form-control @error('password-confirm') is-invalid @enderror" id="passwordConfirm" name="password_confirmation"  placeholder="Confirm Password" required autocomplete="new-password">
                      <i class="fa fa-eye me-3 register-eye" id="togglePassword2"></i>
                      @error('password-confirm')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">{{ __('Register') }}</button>
                </form>
                <hr>
                <div class="text-center mt-4">
                  <a class="small" href="/login">Already have an account? Login!</a>
                </div>
                <!-- <small  class="d-block text-center mt-3">Allready registered ? <a href="/login"> login </a></small> -->
                <!-- </main> -->
              </div>
            </div>
            <div class="register-image-left col-lg-4 mt-lg-5"></div>
          </div>
        </div>
      </div>
      <!-- footer -->
      <footer class="sticky-footer text-white p-0">
        <div class="container my-auto">
          <div class="copyright text-center pt-4">
            <span>Copyright &copy; 2022 . General Affair</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>

<script type="">
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
    });

    const togglePassword2 = document.querySelector('#togglePassword2');
    const passwordConfirm = document.querySelector('#passwordConfirm');

    togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirm.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
</script>

@endsection



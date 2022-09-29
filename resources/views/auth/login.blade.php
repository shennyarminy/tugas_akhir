@include('partials.head')

<body class="login">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div>
          <h2>SPKBP</h2>
        </div>
        <div class="row">
          <div class="col-12 col-sm-6 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="mx-auto">Login</h3>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ url('/') }}" class="needs-validation" novalidate="">
                  <div class="form-group">
                    @csrf
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control " name="email" tabindex="1" required autofocus>

                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label" name= "password" id="password">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> --}}

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
               
           
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="/register">Register Now!</a>
            </div>
            <div class="simple-footer">
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@include('partials.script')
</body>
</html>

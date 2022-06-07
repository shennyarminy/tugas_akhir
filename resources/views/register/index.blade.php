@include('partials.head')

<body>
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class=" col-12 col-md-5 col-lg-6 offset-sm-3 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="mx-auto">Register</h3>
            </div>
        <div class="card-body">
          <form action="/register" method="POST">
            @csrf
            <div class="row">
              <div class="form-floating col-12">
                <label for="nama">Nama</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" autofocus>
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-floating col-12">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" autofocus>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
                @enderror
              </div>

              <div class="form-floating col-12">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-floating col-12">
                <label for="password" class="d-block">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwstrength" value="{{ old('password') }}" data-indicator="pwindicator" name="password">
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
              </div>
          
            <div class="form-group col-12" style="margin-top: 1.5rem">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Register
              </button>
            </div>
            </form>

        </div>
          <div class="text-muted text-center">
            Already registered? <a href="/login">Login</a>
          </div>
          <div class="simple-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

@include('partials.script')
</body>
</html>

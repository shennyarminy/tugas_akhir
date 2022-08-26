@include('partials.head')

<body class="login">
  <div id="app">
    <section class="wrapper fadeInDown">
      <div class="container">
        <div class="row">
          <div class=" col-12 col-md-5 col-lg-6 offset-sm-3 ">
            <div class="card">
              <div class="card-header">
                <h3 class="mx-auto">REGISTER</h3>
              </div>

              <div class="card-body">
                <form action="/register" method="POST">
                  @csrf
                  <div class="row">
                    <div class="form-floating col-12">
                      <label for="nama" >Nama</label>
                      <input id="nama" 
                      class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama">
                      @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="form-floating col-12">
                      <label for="username">Username</label>
                      <input id="username"  class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username">
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
      
                    <div class="col-12 ">
                      <div class="form-group">
                        <label for="roles" class="form-label">Level</label>
                          <select name="roles" class="form-control">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="ADMIN" {{ old('roles') == 'ADMIN'? 'selected' : '' }}
                                  >ADMIN
                              </option>
                              <option value="DM" {{ old('roles') == 'DM' ? 'selected' : '' }}
                                  >DM
                              </option>
                              @error('role')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                          </select>
                      </div>
                    </div>
                
                  <div class="form-group col-12" >
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>   
              </div>
              <div class="text-muted text-center">
                Already registered? <a href="/">Login</a>
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

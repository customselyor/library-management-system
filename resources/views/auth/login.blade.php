<x-auth-layout>


    <div class="card">
        <div class="card-header text-center">{{ __('messages.login') }}</div>

        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                 <div class="input-group mb-3">
                   <input id="email" type="email" placeholder="{{ __('messages.email') }}" 
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                   
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                       @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                  
                  <input id="password" type="password" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password">

                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                             <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('messages.remember_me') }}
                            </label>
             </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('messages.login') }}
              </button>
          </div>
          <!-- /.col -->
        </div>
                 

                 
                 

                
            </form>
        </div>
    </div>
               

</x-auth-layout>


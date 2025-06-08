<div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Login | Pinjam Ruang</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                    <div class="text w-100">
                        <h2>Welcome to login</h2>

                        <p>Don't have an account?</p>
                        <a href="{{ route('register') }}" wire:navigate class="btn btn-white btn-outline-white">Sign
                            Up</a>

                    </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                    @if ($errors->has('form_login_error'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('form_login_error') }}
                        </div>
                    @endif
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#"
                                    class="social-icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-facebook"></span></a>
                                <a href="#"
                                    class="social-icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-twitter"></span></a>
                            </p>
                        </div>
                    </div>
                    <form wire:submit="login" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input wire:model="email" type="email" id="email" name="email" required autofocus autocomplete="email"
                                placeholder="email@example.com" class="form-control">
                            {{-- @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input wire:model="password" label="Password" type="password" required
                                autocomplete="current-password" :placeholder="Password" viewable class="form-control">
                            {{-- @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign
                                In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input wire:model="remember" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="{{ route('password.request') }}" wire:navigate>Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

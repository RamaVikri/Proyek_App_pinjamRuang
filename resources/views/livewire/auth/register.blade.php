<div>
     <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Regsiter | Pinjam Ruang</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                    <div class="text w-100">
                        <h2>Create an account</h2>

                            <p>already have an account?</p>
                            <a href="{{route('login')}}" wire:navigate class="btn btn-white btn-outline-white">Sign In</a>

                    </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign Up</h3>
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
                    <form wire:submit="register" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="name">Name</label>
                            <input wire:model="name" type="text" required autofocus
                                autocomplete="name" placeholder="your full name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input wire:model="email" type="email" required autofocus
                                autocomplete="email" placeholder="email@example.com" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input wire:model="password" label="Password" type="password" required
                                autocomplete="new-password" :placeholder="Password" viewable class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password_confirmation">Confirm Password</label>
                            <input wire:model="password_confirmation" label="Confirm your Password" type="password" required
                                autocomplete="new-password" :placeholder="Password" viewable class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                    <input wire:model="remember" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="{{route('password.request')}}" wire:navigate>Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
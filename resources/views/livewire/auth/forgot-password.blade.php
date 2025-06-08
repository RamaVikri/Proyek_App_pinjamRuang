<div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Forgot Password| Pinjam Ruang</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                    <div class="text w-100">
                        <h2>Forgot Password </h2>
                            <p>return to Login?</p>
                            <a href="{{ route('login') }}" wire:navigate class="btn btn-white btn-outline-white">Sign
                                In</a>
                    </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Forgot Password</h3>
                        </div>
                    </div>
                    <form wire:submit="sendPasswordResetLink" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input wire:model="email" type="email" required autofocus autocomplete="email"
                                placeholder="email@example.com" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Send mail reset
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

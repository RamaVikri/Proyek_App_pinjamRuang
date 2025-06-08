<h1 class="text-2xl font-bold text-center mb-6">Login</h1>

<form wire:submit="login" class="space-y-5">
    {{-- Email --}}
    <div>
        <label class="block text-sm mb-1" for="email">Email</label>
        <input wire:model.defer="email" type="email" id="email" class="w-full border rounded px-3 py-2" placeholder="you@example.com" required autofocus>
        @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    {{-- Password --}}
    <div>
        <label class="block text-sm mb-1" for="password">Password</label>
        <input wire:model.defer="password" type="password" id="password" class="w-full border rounded px-3 py-2" required>
        @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    {{-- Remember Me --}}
    <div class="flex items-center">
        <input wire:model="remember" id="remember" type="checkbox" class="mr-2">
        <label for="remember" class="text-sm">Remember me</label>
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        Log in
    </button>

    {{-- Register & Forgot --}}
    <div class="text-center mt-4 text-sm text-gray-500">
        <a href="{{ route('password.request') }}" class="underline hover:text-gray-700">Forgot your password?</a> |
        <a href="{{ route('register') }}" class="underline hover:text-gray-700">Register</a>
    </div>
</form>

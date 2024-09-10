<x-guest-layout>
    <!-- Session Status -->
    
    <main class=" h-[100vh] bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen">
            <a href="" class="flex items-center justify-center mb-8 text-2xl font-bold lg:mb-10">
                <img src="{{ asset('images/logo.png') }}"
                    class="h-16 mr-4" alt="logo posredu" />
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow">
                <h2 class="text-2xl uppercase font-bold text-gray-900">
                    Login
                </h2>
                <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            autocomplete="username" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            autocomplete="new-password" required>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember_me" aria-describedby="remember" name="remember" type="checkbox"
                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember_me" class="font-medium text-gray-900">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="ml-auto text-sm text-blue-500 hover:underline">Lupa Password?</a>
                        @endif
                    </div>
                    <button type="submit"
                        class="w-full px-5 py-2 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">Login</button>
                </form>
            </div>
        </div>
    
    </main>
</x-guest-layout>

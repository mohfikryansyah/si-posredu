<x-guest-layout>
    <main class=" h-[100vh] bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen">
            <a href="" class="flex items-center justify-center mb-8 text-2xl font-bold lg:mb-10">
                {{-- <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo"> --}}
                <img src="{{ asset('images/logo.png') }}"
                    class="h-16 mr-4" alt="logo posredu" />
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow">
                <h2 class="text-2xl uppercase font-bold text-gray-900">
                    Reset Password
                </h2>
                <form class="mt-8 space-y-6" method="POST" action="{{ route('password.store') }}">
                    @csrf
    
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                    <div class="relative">
                        <input type="email" id="email" name="email"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " value="{{ old('email', $request->email) }}" required autocomplete="username" autofocus/>
                        <label for="email"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " autocomplete="new-password" required />
                        <label for="password"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password Baru</label>
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " autocomplete="new-password" required />
                        <label for="password_confirmation"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Konfirmasi
                            Password</label>
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">Reset Password</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    </div>
                </form>
            </div>
        </div>
    
    </main>
</x-guest-layout>

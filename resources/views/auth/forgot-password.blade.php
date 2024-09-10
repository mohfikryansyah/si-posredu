<x-guest-layout>
    <!-- Session Status -->

    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
    <main class=" h-[100vh] bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen">
            <a href="" class="flex items-center justify-center mb-8 text-2xl font-bold lg:mb-10">
                {{-- <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo"> --}}
                <img src="{{ asset('images/logo.png') }}"
                    class="h-16 mr-4" alt="BPKHTL" />
            </a>
            <!-- Card -->
            <div class="w-full max-w-xl p-6 space-y-2 sm:p-8 bg-white rounded-lg shadow">
                <h2 class="text-2xl uppercase font-bold text-gray-900">
                    {{ __('Reset Password') }}
                </h2>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-2" :status="session('status')" />
                <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    
    </main>
</x-guest-layout>

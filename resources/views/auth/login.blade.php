<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
                <style type="text/css">
                    #aj {color:#FFAB4A;
                        font-size: 100px;
                        margin: -18px }
                    #al{
                        font-size: 30px;
                        color: white;
                    }
                    
                   </style>
            <h1 class="text-center fs-1" id="aj" >AJ</h1>
            <h1 class="text-center fs-3 "id="al" >Aluminio y decoración</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
               ¿No está registrado?
                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" href="{{ route('register') }}">
                    {{ __('Regístrese') }}
                </a>


            <x-button class="ml-4">
                {{ __('Login') }}
            </x-button>
            </div>
           
        </form>
    </x-auth-card>
</x-guest-layout>

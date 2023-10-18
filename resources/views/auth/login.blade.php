<x-guest-layout>
    <x-auth-card>        
        <x-slot name="logo">
            <div style="text-align: center; margin-bottom: 10px;">
                <label style="font-size: 20px; font-family: Times New Roman, Times, serif;">
                    SỞ GIAO THÔNG VẬN TẢI QUẢNG BÌNH<br><b>BAN QLDA <u>ĐẦU TƯ XÂY DỰNG CÔNG TRÌNH</u> GIAO THÔNG</b></label>
            </div>            
            <div style="margin: 0;">
                <img src="/img/logo.png" style="width: 150px;height: 150px; margin-left: auto; margin-right: auto; display: block;">
            </div>
            <div style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
                <label style="color: #0b74b8; font-size: 20px; font-weight: bold; font-family: Times New Roman, Times, serif;">KỲ KIỂM TRA SÁT HẠCH CHUYÊN MÔN, NGHIỆP VỤ VÀ NĂNG LỰC CÔNG TÁC <br>ĐỐI VỚI CÁN BỘ KỸ THUẬT, TƯ VẤN GIÁM SÁT NĂM {{ date("Y") }}</label>
            </div>      
        </x-slot>



        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Địa chỉ thư điện tử')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mật mã')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lưu đăng nhập') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Quên mật mã?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Đăng nhập') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

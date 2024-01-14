<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ชื่อ')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Department -->
        <div>
            <x-input-label for="name" :value="__('ฝ่ายงาน')" />
            <select name="department" class="form-select" aria-label="" required style="width: 100%;">
                <option value="">กรุณาเลือกข้อมูล</option>
                {{-- Loop --}}
                @foreach($dept as $rs)
                    <option value="{{ $rs->place_id }}">
                        {{ $rs->place_name }}
                    </option>
                @endforeach
                {{-- End Loop --}}
            </select>
        </div>

        <!-- Permission -->
        <div>
            <x-input-label for="name" :value="__('สิทธิการใช้งาน')" />
            <select name="perm" class="form-select" aria-label="" required style="width: 100%;">
                <option value="">กรุณาเลือกข้อมูล</option>
                {{-- Loop --}}
                @foreach($perm as $rs)
                    <option value="{{ $rs->perm_id }}">
                        {{ $rs->perm_name }}
                    </option>
                @endforeach
                {{-- End Loop --}}
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

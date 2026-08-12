<x-guest-layout>
    <x-slot name="style">
        <style>
            /* The switch - the box around the slider */
            .switch {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* The slider */
            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 50%;
            left: 10px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(90%);
            -ms-transform: translateX(90%);
            transform: translateX(90%);
            }

            /* Rounded sliders */
            .slider.round {
            border-radius: 10px;
            }

            .slider.round:before {
            border-radius: 10px;
            }
        </style>
    </x-slot>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-label for="firstname" value="{{ __('First Name') }}" />
                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            </div>

            <div class="mt-4">
                <x-label for="lastname" value="{{ __('Last Name') }}" />
                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone Number') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <p>Are you a house owner or a tenant?</p>
                <p id="switchValue" class="px-5">Tenant</p>
                <!-- Rounded switch -->
                <label class="switch">
                    <input type="checkbox" name="is_owner" onchange="selectUserType()" id="switchInput" checked>
                    <span class="slider round"></span>
                </label>
            </div>

            {{-- <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Role') }}" />
                <select name="role" id="" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Select Role</option>
                    <option value="tenant">Tenant</option>
                    <option value="owner">Owner</option>
                </select>
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                  Register
                </x-button>
            </div>
        </form>

        <script>
            let switchValue = document.getElementById('switchValue');


            function selectUserType(){
                let switchInput = document.getElementById('switchInput').checked;

                console.log(switchInput);
                if(switchInput == true){
                    switchValue.innerHTML = 'Owner';
                    // switchValue.classList.remove = 'text-start';
                    // switchValue.classList.add = 'text-end';
                    switchValue.style.textAlign = 'right';
                    console.log("User is an Owner");

                }else{
                    switchValue.innerHTML = 'Tenant';
                    // switchValue.classList.remove = 'text-end';
                    // switchValue.classList.add = 'text-start';
                    switchValue.style.textAlign = 'left';
                    console.log("User is a Tenant");
                }
            }
        </script>
    </x-authentication-card>
</x-guest-layout>

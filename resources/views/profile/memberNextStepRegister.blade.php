<h1>next step register</h1>

<x-guest-layout>
    <form  method="POST" action="{{ route('store.member') }}">
        @csrf
        {{-- role --}}
        <input type="text" name="user" value={{$user->id}}>
      
        <!-- weight -->
        <div>
            <x-input-label for="weight" :value="__('Weight')" />
            <x-text-input id="weight" class="block mt-1 w-full" type="number" min="30" name="weight" :value="old('weight')"  autofocus />
        </div>
        <!-- height -->
        <div>
            <x-input-label for="height" :value="__('Height')" />
            <x-text-input id="height" class="block mt-1 w-full" type="number" min="100" name="height" :value="old('height')" autofocus />
        </div>

         <!-- activity level -->
         <div>
            <select name="activity" id=""  class="block mt-1 w-full" required>
                <option value="" selected disabled>select your activity level</option>
                <option value="1.2"> little or no exercise</option>
                <option value="1.375">sports 1–3 days/week</option>
                <option value="1.55">sports 3–5 days/week</option>
                <option value="1.375">sports 6–7 days/week</option>
                <option value="1.9">twice daily</option>
            </select>
        </div>
       
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

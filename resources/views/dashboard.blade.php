<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @foreach (Auth::user()->roles as $role)
            {{ $role->role }}{{__(' Dashboard') }}
            @endforeach
                
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @checkRole('member')
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! As a Memeber") }}
                </div>
                @endCheckRole
                @checkRole('trainer')
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! As a Trainer") }}
                </div>
                @endCheckRole
                @checkRole('admin')
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($trainerRequests as $request)
                        <div class="flex justify-between">
                            <span>{{ $request->id }}</span>
                            <span>{{ $request->name }}</span>
                            <span>{{ $request->trainersRequestStatus }}</span>
                            <form method="post" action="/request/approve/{{ $request->id }}" >
                                @csrf
                                @method('PUT')
                                {{-- <input type="text" name="user_id" value={{ $request->id }}> --}}
                                <button class="bg-gray-900 text-white px-3 py-1.5 rounded-md">Approve</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                @endCheckRole
            </div>
        </div>
    </div>
</x-app-layout>



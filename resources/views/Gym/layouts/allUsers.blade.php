@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 h-[100vh] bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')    
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <h class="text-4xl font-thin bg-black p-2 rounded-md text-[#de7829]"><i class="bi bi-gear-fill"></i> Manage Members</h>
            <div class="bg-black  card-shadow rounded-lg px-6 py-2 text-white overflow-x-auto">
              
              <div class="max-h-[71vh]  overflow-y-auto ">
                <table class="min-w-full divide-y divide-gray-700 ">
                  <thead class="">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Role
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Email
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-700">
                    @foreach ($users as $user)
                    <tr>
                      {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">
                        {{ $user->name }}
                      </td> --}}
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center gap-x-1">
                        <img src="{{ asset('storage/images/profile/' . $user->image) }}" alt="hhh" class="w-[50px] h-[50px] rounded-full object-cover">
                        <h1>
                            {{ $user->name }}
                        </h1>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        @foreach ($user->roles as $role)
                            {{ $role->role }}
                        @endforeach
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                        {{ $user->email }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm">
                          <form method="post" action="/delete/user/{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                          <button class="bg-[#ff632f] text-white px-4 py-2 rounded-lg shadow-md ml-2 hover:bg-red-700">
                            Delete
                          </button>
                         
                        </form>
                      </td>
                    </tr>
                        
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
            
        
        </div>
    </div>
@endsection


  
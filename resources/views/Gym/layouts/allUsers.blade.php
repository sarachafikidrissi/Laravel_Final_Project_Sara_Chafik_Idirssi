@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')    
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <h class="text-4xl font-thin text-[#de7829]">Members</h>
            <div class="bg-white  card-shadow rounded-lg p-6 text-black overflow-x-auto">
              
              <div class="max-h-[71vh] overflow-y-auto ">
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
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">
                        {{ $user->name }}
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
                          <button class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md ml-2 hover:bg-red-700">
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


  
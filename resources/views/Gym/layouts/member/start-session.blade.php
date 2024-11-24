@extends('Gym.index')

@section('content')
    <div class="flex p-2 gap-x-4 h-[100vh] bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="flex justify-between gap-x-1">
                <div class="w-full h-[82vh] flex gap-x-3">
                    @foreach ($session->exercices as $exercice)
                        <div
                            class="w-[30vw] max-h-[82vh] bg-black rounded-xl shadow-xl gap-y-2  flex flex-col items-center py-4 overflow-y-auto">
                            <div class="w-[85%] h-[10vh] bg-white/20 rounded-xl flex-none relative">
                                <div class="absolute right-3">
                                    <span class="text-white/70 text-sm"> favorites</span>
                                    <i class="text-sm text-red-700 bi bi-heart cursor-pointer"></i>

                                </div>
                                <div class="flex items-center p-2 gap-x-3">
                                    <img src="{{ asset('storage/images/exercices/' . $exercice->image) }}" alt=""
                                        class="w-[100px] h-[8vh] rounded-md object-cover">
                                    <div>
                                        <h1 class="text-white text-xl font-medium">{{ $exercice->name }}</h1>
                                        <span class="text-white/30 text-sm ">{{ $randomNumber }} reps</span>
                                    </div>
                                    <form  method="post" action="{{ route('exercice.completed') }}">
                                        @csrf
                                        <input type="text" name="exercice_id" value={{ $exercice->id }} hidden>
                                      
                                        <label class="relative cursor-pointer ">
                                            <input type="hidden" name="completed" value="0">
                                            <input {{ $isCompleted ? 'checked' : '' }} id="completed" type="checkbox"  value="1" class="peer sr-only" name="completed" />
                                            <div
                                                class="peer h-5 w-9 rounded-full bg-white after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border  after:transition-all after:content-[''] peer-checked:bg-[#ff9522] peer-checked:after:translate-x-full peer-focus:outline-none  ">
                                            </div>
                                        </label>
                
          
                                        <button id="completedBtnSubmit" hidden  type="submit">completed</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    @endforeach
                    <div class="w-[30vw] h-full bg-white rounded-xl shadow-xl"></div>
                </div>
                @include('Gym.layouts.member.right-sidebar')

            </div>
        </div>
    </div>


    <script>
        var completedBtn = document.getElementById('completed');
        completedBtn.addEventListener('click', () => {
            completedBtn.value ? completedBtn.value = 1 : completedBtn.value = 0
            // if(completedBtn.value == 0){
            //     completedBtn.value = 1
            // }else{
            //     completedBtn.value = 0
            // }
            completedBtnSubmit.click();
                     
        })
        
    </script>
@endsection

<div class=" w-[80vw] mt-10  mx-auto flex flex-col gap-y-10 items-center text-white">
    <div class="relative text-center">
        <!-- Large background text -->
        <h1 class="text-8xl font-bold  text-[#7e736b] opacity-20 select-none">
          WHO WE ARE
        </h1>
        <!-- Foreground text -->
        <h2 class="absolute  inset-0 top-20   flex justify-center items-center text-white text-[40px] font-bold">
          WHO WE ARE
        </h2>
      </div>
    <div class="flex w-full h-full">
        <div class="w-[40%] h-full flex items-center">
            <img src="{{ asset('landingPage/gym-equipement2.jpg') }}" alt="" class="w-full h-[45vh] object-cover">
        </div>
        <div class="h-[50vh] w-[50%]   capitalize px-10 py-4 flex flex-col gap-y-4">
            <h1 class="font-bold text-2xl text-[#7e736b]">Who we are for Trainers ?</h1>
            <p class="text-[18px]">
                At get fit, we’re more than a gym—we’re a team of passionate trainers dedicated to changing lives through fitness. Joining us means being part of a supportive community, growing your skills, and inspiring others to reach their potential. If you’re ready to make a real difference, we’d love to have you on our team!
            </p>
            {{-- add a call to action here --}}
        </div>
    </div>
    <div class="flex flex-row-reverse w-full h-full">
        <div class="w-[40%] h-full flex items-center">
            <img src="{{ asset('landingPage/young-man-gym.webp') }}" alt="" class="w-full h-[45vh] object-cover">
        </div>
        <div class="h-[50vh] w-[50%]   capitalize px-10 py-4 flex flex-col gap-y-4">
            <h1 class="font-bold text-2xl text-[#7e736b]">Who we are for members ?</h1>
            <p class="text-[18px]">
                Hi there! We’re more than just a gym—we’re a family that cheers you on every step of the way. Whether you’re just starting out or chasing new goals, we’re here with expert trainers, great workouts, and a supportive community to help you thrive. Let’s crush it together! 
            </p>
            {{-- add a call to action here --}}
        </div>
    </div>
</div>
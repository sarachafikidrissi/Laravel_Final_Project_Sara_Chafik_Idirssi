@extends('Gym.index')
@section('content')
<div class="bg-black bg-opacity-95 w-screen landing-page">
    {{-- Navbar --}}
    {{-- logo , links, buttons to join as memeber/trainer --}}
    
        @include('Landing_Page.components.navbar')
        @include('Landing_Page.components.hero-section')
        @include('Landing_Page.components.about')

    {{-- Footer --}}
</div>
@endsection
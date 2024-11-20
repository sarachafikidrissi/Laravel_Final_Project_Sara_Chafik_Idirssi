<div class="mt-5">
    @checkRole('admin')
        @include('Gym.layouts.admin-dash')
    @endCheckRole

    @checkRole('member')
        @include('Gym.layouts.member.member-dashboard')
    @endCheckRole

</div>
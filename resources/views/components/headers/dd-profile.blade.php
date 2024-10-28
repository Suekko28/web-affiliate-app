<div class="profile-dropdown position-relative" data-simplebar>
    <div class="py-3 px-7 pb-0">
        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
    </div>
    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
        <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80"
            alt="modernize-img" />
        <div class="ms-3">
            {{-- <h5 class="mb-1 fs-3">{{ Auth::user()->name}}</h5> --}}
            {{-- <span class="mb-1 d-block">Designer</span> --}}
            <p class="mb-0 d-flex align-items-center gap-2">
            </p>
        </div>
    </div>
    {{-- <div class="d-grid py-4 px-7 pt-8">
        <a class=" btn btn-secondary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div> --}}
</div>

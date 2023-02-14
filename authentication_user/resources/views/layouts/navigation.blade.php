{{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
    @else
        @if (Route::has('logout'))
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
        @endif
        @if (Route::has('logout'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
</div> --}}

<ul class="nav justify-content-end">
    @auth
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
        </li>
    @else
        @if (Route::has('logout'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}">Login</a>
            </li>
        @endif
        @if (Route::has('logout'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('register') }}">Register</a>
            </li>
        @endif
    @endauth
</ul>
<hr>

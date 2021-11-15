<div class="d-flex justify-content-between bg-primary px-4 py-3 mb-4 rounded-bottom">
    <h4 class="text-white">
        <a href="/" class="text-white text-decoration-none">
            Micro Stack Overflow
        </a>
    </h4>

    <nav>
        @guest
            <x-navigation.nav-item class="text-white" href="/login">Log In</x-navigation.nav-item>
        @else
            <x-navigation.nav-item class="text-white" href="/question/create">Ask Question</x-navigation.nav-item>
            <x-navigation.nav-item class="text-white fw-bold"
                                   href="/user/{{auth()->user()->id}}">
                {{ auth()->user()->username }}
            </x-navigation.nav-item>
            <x-navigation.nav-item class="text-white" href="/logout">Log Out</x-navigation.nav-item>
        @endguest
    </nav>
</div>
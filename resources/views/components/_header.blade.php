<div class="d-flex justify-content-between bg-primary px-4 py-3 mb-4 rounded-bottom">
    <x-questions.title class="text-white"><a href="/" class="text-white text-decoration-none">Micro Stack Overflow</a></x-questions.title>

    <nav>
        <x-navigation.nav-item class="text-white">Ask Question</x-navigation.nav-item>
        @guest
            <x-navigation.nav-item class="text-white" href="/login">Log In</x-navigation.nav-item>
        @else
            <x-navigation.nav-item class="text-white" href="/logout">Log Out</x-navigation.nav-item>
        @endguest
    </nav>
</div>
<div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5">
    <button type="button" class="text-lg text-gray-600">
        <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5">
            </path>
        </svg>
    </button>
    <ul class="flex items-center">
        <li>
            <p class="text-gray-400">@yield('nav-title')</p>
        </li>
    </ul>
    <ul class="ml-auto flex items-center">
        <li>
            <a href="#" type="button" class="mt-2 ml-2">
                <img src="/images/logo.png" alt="Profile"
                    class="w-8 h-8 rounded-full border border-gray-100 hover:bg-gray-100">
            </a>
        </li>
    </ul>
</div>

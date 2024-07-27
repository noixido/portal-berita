<div class="flex flex-col justify-between fixed left-0 top-0 w-64 h-full bg-gray-900 p-4">
    <div>
        <a href="{{ route('admin') }}" class="flex item-center pb-4 border-b border-b-gray-800">
            <img src="/images/favicon.png" alt="Portal Berita Logo" class="w-7 h-7 object-cover">
            <span class="text-lg font-bold text-white ml-3">Portal Berita</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1">
                <a href="{{ route('admin') }}"
                    class="flex item-center py-2 px-4 text-gray-300 hover:text-gray-100 hover:bg-gray-950 rounded-md">
                    <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                        </path>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('berita') }}"
                    class="flex item-center py-2 px-4 text-gray-300 hover:text-gray-100 hover:bg-gray-950 rounded-md">
                    <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z">
                        </path>
                    </svg>
                    <span>Berita</span>
                </a>
            </li>
            @can('admin')
                <li class="mb-1">
                    <a href="{{ route('kategori') }}"
                        class="flex item-center py-2 px-4 text-gray-300 hover:text-gray-100 hover:bg-gray-950 rounded-md">
                        <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"></path>
                        </svg>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pengguna') }}"
                        class="flex item-center py-2 px-4 text-gray-300 hover:text-gray-100 hover:bg-gray-950 rounded-md">
                        <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">
                            </path>
                        </svg>
                        <span>Pengguna</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
    <form action="{{ route('logout') }}">
        @csrf
        <button type="submit" onclick="return confirm('Apakah anda yakin ingin keluar?')"
            class="flex item-center w-full py-2 px-4 text-gray-300 hover:text-gray-100 hover:bg-red-500 rounded-md">
            <svg class="mr-2 w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15">
                </path>
            </svg>
            <span>Logout</span>
        </button>
    </form>
</div>

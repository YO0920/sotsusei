<section class="flex header-color h-50 py-2">
    <div class="container mx-auto flex flex-wrap justify-between items-center">
        <div class="w-full sm:flex-1 flex justify-start sm:justify-start">
            <!-- 空のdivを削除し、左揃えに変更 -->
        </div>
        <div class="text-center mx-auto sm:mx-0 sm:flex-1">
            <a href="{{ route('home') }}" class="block text-white text-4xl font-bold leading-tight">Happi</a>
            <a href="{{ route('home') }}" class="text-white text-sm leading-tight">Happy Recipe</a>
        </div>
        <div class="w-full sm:w-auto sm:flex-1 flex items-center justify-center sm:justify-end space-x-4 mt-2 sm:mt-0">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white header-color focus:outline-none transition ease-in-out duration-150">
                            <div class="ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 header-color">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
            @guest
                <a href="{{ route('register') }}" class="text-white text-sm mr-2">ユーザ登録</a>
                <a href="{{ route('login') }}" class="text-white text-sm">ログイン</a>
            @endguest
        </div>
    </div>
</section>

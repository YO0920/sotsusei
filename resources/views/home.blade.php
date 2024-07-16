<x-app-layout>
    <div class="container mx-auto p-4">
        @foreach($menuSaves as $date => $menus)
            <div class="bg-white rounded p-4 mb-4 shadow-lg">
                <h2 class="text-2xl font-bold mb-4">{{ $date }}</h2>

                {{-- 朝ごはん --}}
                @php $hasBreakfast = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->breakfastCategory1 || $menuSave->breakfastCategory2 || $menuSave->breakfastCategory3_1 || $menuSave->breakfastCategory3_2)
                        @if(!$hasBreakfast)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">朝ごはん</h3>
                                <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                                @php $hasBreakfast = true; @endphp
                        @endif

                        @if($menuSave->breakfastCategory1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->breakfastCategory1->image) }}" alt="{{ $menuSave->breakfastCategory1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->breakfastCategory1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->breakfastCategory2->image) }}" alt="{{ $menuSave->breakfastCategory2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->breakfastCategory2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory3_1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory3_1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->breakfastCategory3_1->image) }}" alt="{{ $menuSave->breakfastCategory3_1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory3_1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->breakfastCategory3_1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory3_2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory3_2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->breakfastCategory3_2->image) }}" alt="{{ $menuSave->breakfastCategory3_2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory3_2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->breakfastCategory3_2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasBreakfast)
                                    </div>
                            </div>
                        @endif

                {{-- 昼ごはん --}}
                @php $hasLunch = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->lunchCategory1 || $menuSave->lunchCategory2 || $menuSave->lunchCategory3_1 || $menuSave->lunchCategory3_2)
                        @if(!$hasLunch)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">昼ごはん</h3>
                                <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                                @php $hasLunch = true; @endphp
                        @endif

                        @if($menuSave->lunchCategory1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->lunchCategory1->image) }}" alt="{{ $menuSave->lunchCategory1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->lunchCategory1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->lunchCategory2->image) }}" alt="{{ $menuSave->lunchCategory2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->lunchCategory2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory3_1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory3_1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->lunchCategory3_1->image) }}" alt="{{ $menuSave->lunchCategory3_1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory3_1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->lunchCategory3_1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory3_2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory3_2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->lunchCategory3_2->image) }}" alt="{{ $menuSave->lunchCategory3_2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory3_2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->lunchCategory3_2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasLunch)
                                    </div>
                            </div>
                        @endif

                {{-- 夜ごはん --}}
                @php $hasDinner = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->dinnerCategory1 || $menuSave->dinnerCategory2 || $menuSave->dinnerCategory3_1 || $menuSave->dinnerCategory3_2)
                        @if(!$hasDinner)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">夜ごはん</h3>
                                <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                                @php $hasDinner = true; @endphp
                        @endif

                        @if($menuSave->dinnerCategory1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->dinnerCategory1->image) }}" alt="{{ $menuSave->dinnerCategory1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->dinnerCategory1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->dinnerCategory2->image) }}" alt="{{ $menuSave->dinnerCategory2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->dinnerCategory2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory3_1)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory3_1->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->dinnerCategory3_1->image) }}" alt="{{ $menuSave->dinnerCategory3_1->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory3_1->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->dinnerCategory3_1->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory3_2)
                            <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory3_2->id]) }}" class="block h-full">
                                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($menuSave->dinnerCategory3_2->image) }}" alt="{{ $menuSave->dinnerCategory3_2->title }}">
                                    <div class="p-2 leading-normal">
                                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory3_2->title }}</h5>
                                        <p class="font-bold text-gray-600 text-sm">{{ $menuSave->dinnerCategory3_2->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasDinner)
                                    </div>
                            </div>
                        @endif
            </div>
        @endforeach
    </div>
    
<div class="bg-white rounded p-4 shadow-lg fixed bottom-0 left-0 w-full h-32 flex flex-col items-center justify-center">
    <p class="text-1xl font-bold mb-4 text-center">メニューを決める</p>
    <form action="{{ route('menu_select') }}" method="GET" class="flex items-center space-x-4">
        @csrf
        <div class="flex items-center space-x-4">
            <!--<label for="date" class="block text-gray-700">日付をえらぶ</label>-->
            <input type="date" name="date" id="date" class="mt-1 block rounded-md border-gray-300 shadow-sm">
            <!--<label for="meal-select" class="block text-gray-700">いつ食べる？</label>-->
            <select name="meal" id="meal-select" class="mt-1 block rounded-md border-gray-300 shadow-sm h-10 w-24">
                <option value="breakfast">朝ごはん</option>
                <option value="lunch">昼ごはん</option>
                <option value="dinner">夜ごはん</option>
            </select>
            <button type="submit" class="header-color text-white px-4 py-2 rounded-md shadow-sm">OK</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dateInput = document.getElementById('date');

        // 今日の日付を取得
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        const dd = String(today.getDate()).padStart(2, '0');
        const todayStr = `${yyyy}-${mm}-${dd}`;

        // 1週間後の日付を取得
        const nextWeek = new Date();
        nextWeek.setDate(today.getDate() + 7);
        const yyyyNextWeek = nextWeek.getFullYear();
        const mmNextWeek = String(nextWeek.getMonth() + 1).padStart(2, '0');
        const ddNextWeek = String(nextWeek.getDate()).padStart(2, '0');
        const nextWeekStr = `${yyyyNextWeek}-${mmNextWeek}-${ddNextWeek}`;

        // デフォルトの日付、最小、最大の日付を設定
        dateInput.value = todayStr;
        dateInput.min = todayStr;
        dateInput.max = nextWeekStr;
    });
</script>



</x-app-layout>


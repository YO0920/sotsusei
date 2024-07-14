<x-app-layout>
    <div class="container">
        @foreach($menuSaves as $date => $menus)
            <div class="bg-white rounded p-4 mb-4">
                <h2 class="text-2xl font-bold mb-2">{{ $date }}</h2>

                {{-- 朝ごはん --}}
                @php $hasBreakfast = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->breakfastCategory1 || $menuSave->breakfastCategory2 || $menuSave->breakfastCategory3_1 || $menuSave->breakfastCategory3_2)
                        @if(!$hasBreakfast)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">朝ごはん</h3>
                                @php $hasBreakfast = true; @endphp
                        @endif

                        @if($menuSave->breakfastCategory1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->breakfastCategory1->image) }}" alt="{{ $menuSave->breakfastCategory1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->breakfastCategory1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->breakfastCategory2->image) }}" alt="{{ $menuSave->breakfastCategory2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->breakfastCategory2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory3_1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory3_1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->breakfastCategory3_1->image) }}" alt="{{ $menuSave->breakfastCategory3_1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory3_1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->breakfastCategory3_1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->breakfastCategory3_2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->breakfastCategory3_2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->breakfastCategory3_2->image) }}" alt="{{ $menuSave->breakfastCategory3_2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->breakfastCategory3_2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->breakfastCategory3_2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasBreakfast)
                    </div>
                @endif

                {{-- 昼ごはん --}}
                @php $hasLunch = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->lunchCategory1 || $menuSave->lunchCategory2 || $menuSave->lunchCategory3_1 || $menuSave->lunchCategory3_2)
                        @if(!$hasLunch)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">昼ごはん</h3>
                                @php $hasLunch = true; @endphp
                        @endif

                        @if($menuSave->lunchCategory1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->lunchCategory1->image) }}" alt="{{ $menuSave->lunchCategory1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->lunchCategory1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->lunchCategory2->image) }}" alt="{{ $menuSave->lunchCategory2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->lunchCategory2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory3_1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory3_1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->lunchCategory3_1->image) }}" alt="{{ $menuSave->lunchCategory3_1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory3_1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->lunchCategory3_1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->lunchCategory3_2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->lunchCategory3_2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->lunchCategory3_2->image) }}" alt="{{ $menuSave->lunchCategory3_2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->lunchCategory3_2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->lunchCategory3_2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasLunch)
                    </div>
                @endif

                {{-- 夜ごはん --}}
                @php $hasDinner = false; @endphp
                @foreach($menus as $menuSave)
                    @if($menuSave->dinnerCategory1 || $menuSave->dinnerCategory2 || $menuSave->dinnerCategory3_1 || $menuSave->dinnerCategory3_2)
                        @if(!$hasDinner)
                            <div class="mb-4">
                                <h3 class="text-xl font-bold mb-2">夜ごはん</h3>
                                @php $hasDinner = true; @endphp
                        @endif

                        @if($menuSave->dinnerCategory1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->dinnerCategory1->image) }}" alt="{{ $menuSave->dinnerCategory1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->dinnerCategory1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->dinnerCategory2->image) }}" alt="{{ $menuSave->dinnerCategory2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->dinnerCategory2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory3_1)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory3_1->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->dinnerCategory3_1->image) }}" alt="{{ $menuSave->dinnerCategory3_1->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory3_1->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->dinnerCategory3_1->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($menuSave->dinnerCategory3_2)
                            <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <a href="{{ route('recipe.show', ['id' => $menuSave->dinnerCategory3_2->id]) }}">
                                    <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($menuSave->dinnerCategory3_2->image) }}" alt="{{ $menuSave->dinnerCategory3_2->title }}">
                                    <div class="flex justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $menuSave->dinnerCategory3_2->title }}</h5>
                                        <div class="flex">
                                            <p class="font-bold mr-2">{{ $menuSave->dinnerCategory3_2->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
                @if($hasDinner)
                    </div>
                @endif
            </div>
        @endforeach
    </div>


    
            <p>メニューを決める</p>
            <p class="text-2xl font-bold mb-2"></p>
            
            <form action="{{ route('menu_select') }}" method="GET">
                @csrf
                <div>
                    <label>日付をえらぶ</label>
                    <input type="date" name="date">
                </div>
                
                <label for="meal-select">いつ食べる？</label>
                <select name="meal" id="meal-select">
                    <option value="breakfast">朝ごはん</option>
                    <option value="lunch">昼ごはん</option>
                    <option value="dinner">夜ごはん</option>
                </select>
                  
                <button type="submit">OK</button>
            </form>
    
    
    
</x-app-layout>
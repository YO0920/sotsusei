<x-app-layout>
   <div class="container">
        @foreach($menuSaves as $menuSave)
            @php
                $breakfastCategories = [
                    $menuSave->breakfastCategory1,
                    $menuSave->breakfastCategory2,
                    $menuSave->breakfastCategory3_1,
                    $menuSave->breakfastCategory3_2
                ];
                $lunchCategories = [
                    $menuSave->lunchCategory1,
                    $menuSave->lunchCategory2,
                    $menuSave->lunchCategory3_1,
                    $menuSave->lunchCategory3_2
                ];
                $dinnerCategories = [
                    $menuSave->dinnerCategory1,
                    $menuSave->dinnerCategory2,
                    $menuSave->dinnerCategory3_1,
                    $menuSave->dinnerCategory3_2
                ];
            @endphp

            @if(array_filter($breakfastCategories) || array_filter($lunchCategories) || array_filter($dinnerCategories))
                <div class="bg-white rounded p-4 mb-4">
                    <h2 class="text-2xl font-bold mb-2">{{ $menuSave->date }}</h2>

                    @if(array_filter($breakfastCategories))
                        <div class="mb-4">
                            <h3 class="text-xl font-bold mb-2">朝ごはん</h3>
                            @foreach($breakfastCategories as $recipe)
                                <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                    @if($recipe)
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}">
                                            <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="flex justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                                <div class="flex">
                                                    <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="h-40 w-40 flex items-center justify-center bg-gray-200 rounded-t-lg">
                                            <span class="text-gray-500">No Data</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(array_filter($lunchCategories))
                        <div class="mb-4">
                            <h3 class="text-xl font-bold mb-2">昼ごはん</h3>
                            @foreach($lunchCategories as $recipe)
                                <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                    @if($recipe)
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}">
                                            <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="flex justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                                <div class="flex">
                                                    <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="h-40 w-40 flex items-center justify-center bg-gray-200 rounded-t-lg">
                                            <span class="text-gray-500">No Data</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(array_filter($dinnerCategories))
                        <div class="mb-4">
                            <h3 class="text-xl font-bold mb-2">夜ごはん</h3>
                            @foreach($dinnerCategories as $recipe)
                                <div class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                    @if($recipe)
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}">
                                            <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="flex justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                                <div class="flex">
                                                    <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <div class="h-40 w-40 flex items-center justify-center bg-gray-200 rounded-t-lg">
                                            <span class="text-gray-500">No Data</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
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
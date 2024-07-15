<x-app-layout>
    <div class="bg-white rounded p-4">
        
        <h5 class="text-center font-semibold">メニューを決める</h5>
        <form action="{{ route('menu_store') }}" method="POST">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="meal" value="{{ $meal }}">

            @if (isset($recipes_category1) || isset($recipes_category2) || isset($recipes_category3_1) || isset($recipes_category3_2))
                <div class="bg-white rounded p-4">
                    <div class="flex justify-center">
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                            @isset($recipes_category1)
                                @foreach($recipes_category1 as $recipe)
                                    <input type="hidden" name="recipes_category1[]" value="{{ $recipe->id }}">
                                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full recipe-card flex flex-col justify-between" id="recipe-card-1-{{ $loop->index }}">
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="block">
                                            <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="p-2 leading-normal">
                                                <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800 truncate">{{ $recipe->title }}</h5>
                                                <p class="font-bold text-gray-600 text-sm truncate">{{ $recipe->name }}</p>
                                            </div>
                                        </a>
                                        <a href="#" class="header-color text-white px-4 py-1 mt-2 rounded-md shadow-sm block text-center change-button" data-category="1" data-index="{{ $loop->index }}">変更</a>
                                    </div>
                                @endforeach
                            @endisset

                            @isset($recipes_category2)
                                @foreach($recipes_category2 as $recipe)
                                    <input type="hidden" name="recipes_category2[]" value="{{ $recipe->id }}">
                                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full recipe-card flex flex-col justify-between" id="recipe-card-2-{{ $loop->index }}">
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="block">
                                            <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="p-2 leading-normal">
                                                <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800 truncate">{{ $recipe->title }}</h5>
                                                <p class="font-bold text-gray-600 text-sm truncate">{{ $recipe->name }}</p>
                                            </div>
                                        </a>
                                        <a href="#" class="header-color text-white px-4 py-1 mt-2 rounded-md shadow-sm block text-center change-button" data-category="2" data-index="{{ $loop->index }}">変更</a>
                                    </div>
                                @endforeach
                            @endisset

                            @isset($recipes_category3_1)
                                @foreach($recipes_category3_1 as $recipe)
                                    <input type="hidden" name="recipes_category3_1[]" value="{{ $recipe->id }}">
                                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full recipe-card flex flex-col justify-between" id="recipe-card-3-1-{{ $loop->index }}">
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="block">
                                            <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="p-2 leading-normal">
                                                <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800 truncate">{{ $recipe->title }}</h5>
                                                <p class="font-bold text-gray-600 text-sm truncate">{{ $recipe->name }}</p>
                                            </div>
                                        </a>
                                        <a href="#" class="header-color text-white px-4 py-1 mt-2 rounded-md shadow-sm block text-center change-button" data-category="3-1" data-index="{{ $loop->index }}">変更</a>
                                    </div>
                                @endforeach
                            @endisset

                            @isset($recipes_category3_2)
                                @foreach($recipes_category3_2 as $recipe)
                                    <input type="hidden" name="recipes_category3_2[]" value="{{ $recipe->id }}">
                                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 w-full h-full recipe-card flex flex-col justify-between" id="recipe-card-3-2-{{ $loop->index }}">
                                        <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="block">
                                            <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                            <div class="p-2 leading-normal">
                                                <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-800 truncate">{{ $recipe->title }}</h5>
                                                <p class="font-bold text-gray-600 text-sm truncate">{{ $recipe->name }}</p>
                                            </div>
                                        </a>
                                        <a href="#" class="header-color text-white px-4 py-1 mt-2 rounded-md shadow-sm block text-center change-button" data-category="3-2" data-index="{{ $loop->index }}">変更</a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            @endif
            <button type="submit" class="header-color text-white px-4 py-2 mt-4 rounded-md shadow-sm block text-center">決定</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.change-button').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const category = this.getAttribute('data-category');
                    const index = this.getAttribute('data-index');

                    fetch(`menu_change?category=${category}`)
                        .then(response => response.json())
                        .then(data => {
                            const card = document.getElementById(`recipe-card-${category}-${index}`);
                            card.querySelector('a').setAttribute('href', `/sotsusei/recipes/${data.id}`);
                            const assetUrl = "{{ asset('') }}".trim();  // asset関数のベースURLを取得
                            card.querySelector('img').setAttribute('src', `${assetUrl}${data.image}`);
                            card.querySelector('img').setAttribute('alt', data.title);
                            card.querySelector('h5').textContent = data.title;

                            // hidden inputの値も更新
                            const inputSelector = `input[name="recipes_category${category.replace('-', '_')}[]"]`;
                            const hiddenInputs = document.querySelectorAll(inputSelector);
                            if (hiddenInputs.length > index) {
                                hiddenInputs[index].value = data.id;
                            }
                        });
                });
            });
        });
    </script>
</x-app-layout>

<x-app-layout>
   <div class="bg-white rounded p-4">
    <form action="{{ route('menu_store') }}" method="POST">
        @csrf
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="meal" value="{{ $meal }}">
        
        @if (isset($recipes_category1) || isset($recipes_category2) || isset($recipes_category3_1) || isset($recipes_category3_2))
            <div class="bg-white rounded p-4">
                @isset($recipes_category1)
                    @foreach($recipes_category1 as $recipe)
                        <input type="hidden" name="recipes_category1[]" value="{{ $recipe->id }}">
                        <!-- 各カードに一意のIDを追加 -->
                        <div class="recipe-card" id="recipe-card-1-{{ $loop->index }}">
                            <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                <div class="flex justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                    <div class="flex">
                                        <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                    </div>
                                </div>
                            </a>
                            <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                            <a href="#" class="text-gray-600 block text-center change-button" data-category="1" data-index="{{ $loop->index }}">変更</a>
                        </div>
                    @endforeach
                @endisset
                
                @isset($recipes_category2)
                    @foreach($recipes_category2 as $recipe)
                        <input type="hidden" name="recipes_category2[]" value="{{ $recipe->id }}">
                        <!-- 各カードに一意のIDを追加 -->
                        <div class="recipe-card" id="recipe-card-2-{{ $loop->index }}">
                            <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                <div class="flex justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                    <div class="flex">
                                        <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                    </div>
                                </div>
                            </a>
                            <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                            <a href="#" class="text-gray-600 block text-center change-button" data-category="2" data-index="{{ $loop->index }}">変更</a>
                        </div>
                    @endforeach
                @endisset

                @isset($recipes_category3_1)
                    @foreach($recipes_category3_1 as $recipe)
                        <input type="hidden" name="recipes_category3_1[]" value="{{ $recipe->id }}">
                        <!-- 各カードに一意のIDを追加 -->
                        <div class="recipe-card" id="recipe-card-3-1-{{ $loop->index }}">
                            <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                <div class="flex justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                    <div class="flex">
                                        <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                    </div>
                                </div>
                            </a>
                            <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                            <a href="#" class="text-gray-600 block text-center change-button" data-category="3-1" data-index="{{ $loop->index }}">変更</a>
                        </div>
                    @endforeach
                @endisset

                @isset($recipes_category3_2)
                    @foreach($recipes_category3_2 as $recipe)
                        <input type="hidden" name="recipes_category3_2[]" value="{{ $recipe->id }}">
                        <!-- 各カードに一意のIDを追加 -->
                        <div class="recipe-card" id="recipe-card-3-2-{{ $loop->index }}">
                            <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                                <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{ $recipe->title }}">
                                <div class="flex justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{ $recipe->title }}</h5>
                                    <div class="flex">
                                        <p class="font-bold mr-2">{{ $recipe->name }}</p>
                                    </div>
                                </div>
                            </a>
                            <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                            <a href="#" class="text-gray-600 block text-center change-button" data-category="3-2" data-index="{{ $loop->index }}">変更</a>
                        </div>
                    @endforeach
                @endisset
            </div>
        @endif
        <button type="submit">決定</button>
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
                        document.querySelector(`input[name="recipes_category${category.replace('-', '_')}[]"]`).value = data.id;
                    });
            });
        });
    });
</script>
    


    
    
    
</x-app-layout>
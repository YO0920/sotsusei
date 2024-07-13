<x-app-layout>

   
                
    
    <div class="bg-white rounded p-4">
      
    @if (isset($recipes_category1) || isset($recipes_category2) || isset($recipes_category3_1) || isset($recipes_category3_2))
      <div class="bg-white rounded p-4">
  
  
        @isset($recipes_category2)
          @foreach($recipes_category2 as $recipe)
                <!-- 各カードに一意のIDを追加 -->
                <div class="recipe-card" id="recipe-card-2-{{ $loop->index }}">
                    <a href="{{ route('recipe.show',['id' => $recipe['id']]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                        <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{$recipe->title}}">
                        <div class="flex justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
                                <div class="flex">
                                    <p class="font-bold mr-2">{{$recipe->name}}</p>
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
                <!-- 各カードに一意のIDを追加 -->
                <div class="recipe-card" id="recipe-card-3-1-{{ $loop->index }}">
                    <a href="{{ route('recipe.show',['id' => $recipe['id']]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                        <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{$recipe->title}}">
                        <div class="flex justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
                                <div class="flex">
                                    <p class="font-bold mr-2">{{$recipe->name}}</p>
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
                <!-- 各カードに一意のIDを追加 -->
                <div class="recipe-card" id="recipe-card-3-2-{{ $loop->index }}">
                  <a href="{{ route('recipe.show',['id' => $recipe['id']]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                      <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{$recipe->title}}">
                      <div class="flex justify-between p-4 leading-normal">
                          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
                          <div class="flex">
                              <p class="font-bold mr-2">{{$recipe->name}}</p>
                          </div>
                      </div>
                  </a>
                  <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                  <a href="#" class="text-gray-600 block text-center change-button" data-category="3-2" data-index="{{ $loop->index }}">変更</a>
                        </div>
          @endforeach
        @endisset
        
        @isset($recipes_category1)
          @foreach($recipes_category1 as $recipe)
                 <!-- 各カードに一意のIDを追加 --> 
                <div class="recipe-card" id="recipe-card-1-{{ $loop->index }}">
                    <a href="{{ route('recipe.show',['id' => $recipe['id']]) }}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                        <img class="object-cover rounded-t-lg h-40 w-40 mrounded-none rounded-l-lg" src="{{ asset($recipe->image) }}" alt="{{$recipe->title}}">
                        <div class="flex justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
                                <div class="flex">
                                    <p class="font-bold mr-2">{{$recipe->name}}</p>
                                </div>
                        </div>
                            </a>
                    <!-- 各変更ボタンにdata-categoryとdata-indexを追加 -->
                    <a href="#" class="text-gray-600 block text-center change-button" data-category="1" data-index="{{ $loop->index }}">変更</a>
                </div>
          @endforeach
        @endisset    

    @endif
    </div>
    
            
    <a href="#" class="text-gray-600 block text-center">決定</a>
    
    
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
                    card.querySelector('a').setAttribute('href', `/recipe/show/${data.id}`);
                    card.querySelector('img').setAttribute('src', data.image);
                    card.querySelector('img').setAttribute('alt', data.title);
                    card.querySelector('h5').textContent = data.title;
                });
        });
    });
});

  </script>
    
    
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      
      <a href="#" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-1 text-lg font-medium text-gray-900">ナスとトマトのチーズ焼き</h3>
      </a>
      <a href="#" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-1 text-lg font-medium text-gray-900">白米</h3>
      </a>
      <a href="#" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-1 text-lg font-medium text-gray-900">ほうれんそうの胡麻和え</h3>
      </a>
      <a href="#" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-1 text-lg font-medium text-gray-900">にんじんサラダ</h3>
      </a>

      <!-- More products... -->
    </div>
  </div>
</div>

    
    
    
</x-app-layout>
<section class="bg-white h-50 py-2">
    <div class="container mx-auto flex justify-between">

        <div class="flex">
    @auth
         <p>メニューを決める</p>
                  <p class="text-2xl font-bold mb-2"></p>
                 <label>日付をえらぶ</label><input type="date">
                 
                                  <label for="meal-select">いつ食べる？</label>
                  <select name="meal" id="meal-select">
                    <option value="breadkfast">朝ごはん</option>
                    <option value="lunch">昼ごはん</option>
                    <option value="dinner">夜ごはん</option>
                  </select>
                  
                  <a href="{{route('menu_select')}}">OK</a>
    @endauth
    @guest

        </div>
    </div>
    @endguest
</section>
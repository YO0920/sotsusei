<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;
use App\Models\MenuSave; // これを追加
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // これを追加

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
               // ログインしているユーザーのメニューを取得
        $userId = auth()->user()->id;
        $menuSaves = MenuSave::where('user_id', $userId)
            ->orderBy('date', 'asc')
            ->with(['breakfastCategory1', 'breakfastCategory2', 'breakfastCategory3_1', 'breakfastCategory3_2', 'lunchCategory1', 'lunchCategory2', 'lunchCategory3_1', 'lunchCategory3_2', 'dinnerCategory1', 'dinnerCategory2', 'dinnerCategory3_1', 'dinnerCategory3_2'])
            ->get();

        return view('home', compact('menuSaves'));
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $recipes = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
            ->orderBy('recipes.created_at', 'desc') 
            ->limit(4)
            ->get();
            
            // dd($recipes);
        
        return view ('home', compact('recipes'));
    }
    
    public function menu_select(Request $request)
    {
         $validatedData = $request->validate([
            'date' => 'required|date',
            'meal' => 'required|string|in:breakfast,lunch,dinner',
        ]);

        // 選択した日付と食事の種類を取得
        $date = $validatedData['date'];
        $meal = $validatedData['meal'];
      // mealIdを初期化
    $mealId = null;
    
    if ($request->has('meal')) {
        // フォームから送信されたmealの値を取得
        $meal = $request->input('meal');
        
        // mealの値を基にmeal_idを設定
        if ($meal === 'breakfast') {
            $mealId = 1;
        } elseif ($meal === 'lunch') {
            $mealId = 2;
        } elseif ($meal === 'dinner') {
            $mealId = 3;
        }
    }
            
        $recipes_category1 = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
            ->where('recipes.category_id', 1)
            ->inRandomOrder()
            ->limit(1)
            ->get();
            
        // カテゴリ2のレシピをランダムに1つ取得
        $recipes_category2 = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
        ->where('recipes.category_id', 2)
        ->when($mealId, function ($query, $mealId) {
            return $query->where('recipes.meal_id', $mealId);
        })
        ->inRandomOrder()
        ->limit(1)
        ->get();
            
        $recipes_category3_1 = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
            ->where('recipes.category_id', 3)
            ->inRandomOrder()
            ->limit(1)
            ->get();
            
        $recipes_category3_2 = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
            ->where('recipes.category_id', 3)
            ->inRandomOrder()
            ->limit(1)
            ->get();    
            
            // dd($recipes);
        
        return view ('menu_select', compact('date', 'meal','recipes_category1', 'recipes_category2', 'recipes_category3_1', 'recipes_category3_2'));
    
        
        // フォームがまだ送信されていない場合は、単にフォームを表示するだけとする
        return view('menu_select');
        
        
    }
    
 public function menuChange(Request $request)
{
    $category = $request->query('category');
    $mealId = null;

    $recipe = Recipe::select('id', 'title', 'image')
        ->where('category_id', $category)
        ->when($mealId, function ($query, $mealId) {
            return $query->where('meal_id', $mealId);
        })
        ->inRandomOrder()
        ->first();

    return response()->json($recipe);
}
    

    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeMenu(Request $request)
    {
          $validatedData = $request->validate([
        'date' => 'required|date',
        'meal' => 'required|string|in:breakfast,lunch,dinner',
        'recipes_category1' => 'nullable|array',
        'recipes_category1.*' => 'nullable|uuid',
        'recipes_category2' => 'nullable|array',
        'recipes_category2.*' => 'nullable|uuid',
        'recipes_category3_1' => 'nullable|array',
        'recipes_category3_1.*' => 'nullable|uuid',
        'recipes_category3_2' => 'nullable|array',
        'recipes_category3_2.*' => 'nullable|uuid',
    ]);

    // ユーザーIDは認証されているユーザーから取得
    $userId = auth()->user()->id;

    $menuSave = new MenuSave;
    $menuSave->id = Str::uuid();
    $menuSave->user_id = $userId;
    $menuSave->date = $validatedData['date'];

    switch ($validatedData['meal']) {
        case 'breakfast':
            $menuSave->breakfast_category1_id = $validatedData['recipes_category1'][0] ?? null;
            $menuSave->breakfast_category2_id = $validatedData['recipes_category2'][0] ?? null;
            $menuSave->breakfast_category3_1_id = $validatedData['recipes_category3_1'][0] ?? null;
            $menuSave->breakfast_category3_2_id = $validatedData['recipes_category3_2'][0] ?? null;
            break;
        case 'lunch':
            $menuSave->lunch_category1_id = $validatedData['recipes_category1'][0] ?? null;
            $menuSave->lunch_category2_id = $validatedData['recipes_category2'][0] ?? null;
            $menuSave->lunch_category3_1_id = $validatedData['recipes_category3_1'][0] ?? null;
            $menuSave->lunch_category3_2_id = $validatedData['recipes_category3_2'][0] ?? null;
            break;
        case 'dinner':
            $menuSave->dinner_category1_id = $validatedData['recipes_category1'][0] ?? null;
            $menuSave->dinner_category2_id = $validatedData['recipes_category2'][0] ?? null;
            $menuSave->dinner_category3_1_id = $validatedData['recipes_category3_1'][0] ?? null;
            $menuSave->dinner_category3_2_id = $validatedData['recipes_category3_2'][0] ?? null;
            break;
    }

    $menuSave->save();
    
    return redirect()->route('home')->with('success', 'メニューが保存されました。');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::with(['ingredients','steps', 'reviews.user'])
            ->where('recipes.id',$id)
            ->first();
        $recipe_recode = Recipe::find($id);
        $recipe_recode->increment('views'); 
        //リレーションで材料とステップを取得
        // dd($recipe);
        
        return view('recipes.show', compact('recipe'));
    
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

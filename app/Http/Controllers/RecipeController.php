<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $recipes = Recipe::select('recipes.id', 'recipes.title', 'recipes.image')
            ->orderBy('recipes.created_at', 'desc') //☆ここをどう変える？？
            ->limit(4)
            ->get();
            
            // dd($recipes);
        
        return view ('home', compact('recipes'));
    }
    
    public function menu_select(Request $request)
    {
        
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
        
        return view ('menu_select', compact('recipes_category1', 'recipes_category2', 'recipes_category3_1', 'recipes_category3_2'));
    
        
        // フォームがまだ送信されていない場合は、単にフォームを表示するだけとする
        return view('menu_select');
        
        
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
    public function store(Request $request)
    {
        //
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

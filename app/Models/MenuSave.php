<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSave extends Model
{
        use HasFactory;

    protected $fillable = [
        'user_id', 'date', 'breakfast_category1_id', 'breakfast_category2_id', 'breakfast_category3_1_id', 'breakfast_category3_2_id',
        'lunch_category1_id', 'lunch_category2_id', 'lunch_category3_1_id', 'lunch_category3_2_id',
        'dinner_category1_id', 'dinner_category2_id', 'dinner_category3_1_id', 'dinner_category3_2_id'
    ];

    public function breakfastCategory1()
    {
        return $this->belongsTo(Recipe::class, 'breakfast_category1_id');
    }

    public function breakfastCategory2()
    {
        return $this->belongsTo(Recipe::class, 'breakfast_category2_id');
    }

    public function breakfastCategory3_1()
    {
        return $this->belongsTo(Recipe::class, 'breakfast_category3_1_id');
    }

    public function breakfastCategory3_2()
    {
        return $this->belongsTo(Recipe::class, 'breakfast_category3_2_id');
    }

    public function lunchCategory1()
    {
        return $this->belongsTo(Recipe::class, 'lunch_category1_id');
    }

    public function lunchCategory2()
    {
        return $this->belongsTo(Recipe::class, 'lunch_category2_id');
    }

    public function lunchCategory3_1()
    {
        return $this->belongsTo(Recipe::class, 'lunch_category3_1_id');
    }

    public function lunchCategory3_2()
    {
        return $this->belongsTo(Recipe::class, 'lunch_category3_2_id');
    }

    public function dinnerCategory1()
    {
        return $this->belongsTo(Recipe::class, 'dinner_category1_id');
    }

    public function dinnerCategory2()
    {
        return $this->belongsTo(Recipe::class, 'dinner_category2_id');
    }

    public function dinnerCategory3_1()
    {
        return $this->belongsTo(Recipe::class, 'dinner_category3_1_id');
    }

    public function dinnerCategory3_2()
    {
        return $this->belongsTo(Recipe::class, 'dinner_category3_2_id');
    }
}
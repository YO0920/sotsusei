<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->uuid('id',36)->primary();
            $table->foreignUuId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('meal_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->text('point');
            $table->text('image')->nullable();
            $table->integer('carbo')->nullable();
            $table->text('lipid')->nullable();
            $table->text('protein')->nullable();
            $table->text('dietary_fiber')->nullable();
            $table->boolean('staple_contain');
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('deleted_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};

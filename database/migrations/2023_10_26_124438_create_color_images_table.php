<?php

use App\Models\Color;
use App\Models\Image;
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
        Schema::create('color_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Color::class)->constrained()
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Image::class)->constrained()
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_images');
    }
};
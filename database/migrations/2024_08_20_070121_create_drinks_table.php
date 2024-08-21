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
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('type_id')->comment('系列id');
            $table->string('name', 50)->comment('飲料名稱');
            $table->boolean('cold')->default(1)->comment('1=冷,0=沒有冷');
            $table->boolean('hot')->default(0)->comment('1=熱,0=沒有熱');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks');
    }
};

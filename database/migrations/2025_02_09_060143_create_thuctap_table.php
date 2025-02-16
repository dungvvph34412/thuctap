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
        Schema::create('thuctap', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('avatar', 255)->nullable();  
            $table->date('birthday');
            $table->text('biography');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuctap');
    }
};

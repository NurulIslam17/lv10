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
        Schema::create('ifatrs', function (Blueprint $table) {
            $table->id();
            $table->string('ramadan');
            $table->string('nurul')->nullable();
            $table->string('mizan')->nullable();
            $table->string('afik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ifatrs');
    }
};

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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->string('name', 255);
            $table->integer('contact_no');
            $table->string('address', 255);
            $table->string('host');
            $table->dateTime('arrival', precision: 0);
            $table->dateTime('departure', precision: 0);
            $table->softDeletes();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};

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
        Schema::create('time__logs', function (Blueprint $table) {
            $table->id();
            $table->date('Date')->nullable();
            $table->Time('Start_time')->nullable();
            $table->Time('End_time')->nullable();
            $table->BigInteger('User_id')->nullable()->unsigned();
            
            $table->BigInteger('Project_id')->nullable()->unsigned()       ;
        
            $table->foreign('User_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('Project_id')->references('id')->on('Projects')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time__logs');
    }
};

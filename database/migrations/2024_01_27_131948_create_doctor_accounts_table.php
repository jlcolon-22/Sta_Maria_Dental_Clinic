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
        Schema::create('doctor_accounts', function (Blueprint $table) {
            $table->id()->from(30020000);
            $table->unsignedBigInteger('branch_id');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('number');
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_accounts');
    }
};

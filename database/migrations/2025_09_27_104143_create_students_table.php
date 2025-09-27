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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('middlename')->nullable();
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('admission_date')->nullable();
            $table->decimal('admission_fee', 8, 2)->nullable();
            $table->string('faculty')->nullable();
            $table->string('course')->nullable();
            $table->string('branch')->nullable();
            $table->string('batch_time')->nullable();
            $table->string('status')->default('Active');
            $table->string('enrollment_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

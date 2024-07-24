<?php

use App\Models\User;
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
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            // employer_id column
            $table->foreignIdFor(\App\Models\User::class, 'created_by');
            $table->string('Title');
            $table->string('Salary');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {}

  
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('label_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->foreignId('label_id')->constrained('labels')->onDelete('cascade');
            $table->unique(['task_id','label_id']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
            Schema::dropIfExists('label_task');
        
    }
};
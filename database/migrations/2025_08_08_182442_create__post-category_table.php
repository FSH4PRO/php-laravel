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
        Schema::create('post-category', function (Blueprint $table) {
            $table->foreignId("post_id")->constrained("Posts", "post_id")->onDelete("cascade");
            $table->foreignId("category_id")->constrained("Categories", "category_id")->onDelete("cascade");
            $table->primary(["post_id","category_id"]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post-category');
    }
};

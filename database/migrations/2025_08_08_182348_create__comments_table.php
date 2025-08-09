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
        Schema::create('Comments', function (Blueprint $table) {
            $table->id("comment_id");
            $table->text("content");
            $table->foreignId("user_id")->nullable()->constrained("Users", "user_id")->onDelete("cascade");
            $table->foreignId("post_id")->nullable()->constrained("Posts", "post_id")->onDelete("cascade");

            $table->timestamp("crated_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Comments');
    }
};

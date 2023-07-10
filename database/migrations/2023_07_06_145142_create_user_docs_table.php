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
        Schema::create('user_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('il_w4')->nullable();
            $table->string('emp_verification')->nullable();
            $table->string('bg_auth_form')->nullable();
            $table->string('direct_deposit')->nullable();
            $table->string('health_ins')->nullable();
            $table->string('8850')->nullable();
            $table->string('crp_certification')->nullable();
            $table->string('emp_handbook')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_docs');
    }
};

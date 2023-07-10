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
        Schema::create('shifts_assigneds', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts')->where('status', 1)->onDelete('cascade');

            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')->where('type', 4)->onDelete('cascade');

            $table->boolean('is_clocked_in')->nullable();
            $table->boolean('is_clocked_out')->nullable();
            $table->time('clocked_in_time')->nullable();
            $table->time('clocked_out_time')->nullable();
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
        Schema::dropIfExists('shifts_assigneds');
    }
};

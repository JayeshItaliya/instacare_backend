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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')->where('type', 4)->onDelete('cascade');

            $table->unsignedBigInteger('facilities_id');
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade');

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(1);
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
        Schema::dropIfExists('availabilities');
    }
};

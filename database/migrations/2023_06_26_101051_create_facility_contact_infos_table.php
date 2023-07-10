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
        Schema::create('facility_contact_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facilities_id');
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('facility_contact_infos');
    }
};

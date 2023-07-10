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
        Schema::create('user_access_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('user_type')->comment('1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee');
            $table->boolean('dashboard')->nullable();
            $table->boolean('schedule')->nullable();
            $table->boolean('people')->nullable();
            $table->boolean('facilities')->nullable();
            $table->boolean('messaging')->nullable();
            $table->boolean('timecards')->nullable();
            $table->boolean('whos_on')->nullable();
            $table->boolean('total_billing')->nullable();
            $table->boolean('support')->nullable();
            $table->boolean('my_availability')->nullable();
            $table->boolean('payroll')->nullable();
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
        Schema::dropIfExists('user_access_settings');
    }
};

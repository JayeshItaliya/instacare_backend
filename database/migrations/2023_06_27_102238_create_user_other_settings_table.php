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
        Schema::create('user_other_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('user_type')->comment('1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee');
            $table->boolean('automatic_clock_out')->nullable();
            $table->boolean('restrict_clock_in_before_shift')->nullable();
            $table->string('restrict_clock_in_before_shift_time_period')->nullable()->comment('In Mins');
            $table->boolean('restrict_clock_in_during_the_shift')->nullable();
            $table->string('restrict_clock_in_during_the_shift_time_period')->nullable()->comment('In Mins');
            $table->boolean('point_expiry_date')->nullable();
            $table->string('point_expiry_date_time_period')->nullable()->comment('In Days');
            $table->boolean('incentives_who_havent_clock_in')->nullable();
            $table->string('incentives_who_havent_clock_in_time_period')->nullable()->comment('In Days');
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
        Schema::dropIfExists('user_other_settings');
    }
};

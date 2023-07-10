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
        Schema::create('user_permission_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('user_type')->comment('1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee');
            $table->boolean('create_reminders')->nullable();
            $table->boolean('create_schedule')->nullable();
            $table->boolean('delete_schedule')->nullable();
            $table->boolean('process_timecard')->nullable();
            $table->boolean('report_timecard')->nullable();
            $table->boolean('write_review')->nullable();
            $table->boolean('messaging')->nullable();
            $table->boolean('create_timecard')->nullable();
            $table->boolean('add_points')->nullable();
            $table->boolean('clock_in_shifts')->nullable();
            $table->boolean('clock_out_shifts')->nullable();
            $table->boolean('cancel_shifts')->nullable();
            $table->boolean('signature')->nullable();
            $table->boolean('accepting_shifts')->nullable();
            $table->boolean('download_timecard')->nullable();
            $table->boolean('report_an_issue')->nullable();
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
        Schema::dropIfExists('user_permission_settings');
    }
};

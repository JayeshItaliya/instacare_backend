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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1=Single Shifts, 2=Recurring Shifts, 3=Bulk Upload, 4=Bulk Shifts');

            $table->unsignedBigInteger('facilities_id');
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade');

            $table->enum('role', ['rn', 'lpn', 'cna']);
            $table->integer('positions');
            $table->date('date');
            $table->tinyInteger('shift_time')->comment('1=Morning Shift: 7:00AM - 3:00PM, 2=Noon Shift: 3:00PM - 11:00PM, 3=Night Shift: 11:00PM - 7:00AM, 4=Custom');
            $table->integer('duration');
            $table->enum('recurring_days', ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat']);
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('incentives')->default(1);
            $table->tinyInteger('incentive_type')->default(0)->comment('0=Hourly,1=Fixed');
            $table->enum('incentive_by', ['instacare']);
            $table->integer('incentive_amount');
            $table->integer('rate')->comment('per hour')->nullable();
            $table->string('floor_number');
            $table->boolean('cancellation_guarantee')->default(1);
            $table->integer('supervisior_id');
            $table->text('notes');

            $table->tinyInteger('status')->default(1)->comment('1=Open Shifts, 2=Confirmed Shifts, 3=Shift in Progress, 4=Completed Shifts, 5=Call Offs Shifts, 6=Facility Cancellation, 7=Late');

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
        Schema::dropIfExists('shifts');
    }
};

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
        Schema::create('billing_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facilities_id');
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->float('max_billing_monthly');
            $table->float('hourly_rate');
            $table->float('weekend_hourly_rates');
            $table->float('holiday_hourly_rates');
            $table->float('max_monthly_incentive');
            $table->float('max_monthly_incentive_per_hour');
            $table->float('max_monthly_incentive_fixed');
            $table->boolean('allow_overtime')->default(0)->comment('0=false,1=true');
            $table->float('overtime_hourly_rate');
            $table->float('overtime_percentage');
            $table->enum('invoice_delivery', ['email','physical','both']);
            $table->enum('invoice_statement', ['daily', 'weekly', 'monthly', 'custom']);
            $table->date('invoice_statement_start_date')->nullable();
            $table->date('invoice_statement_end_date')->nullable();
            $table->enum('invoice_frequency_delivery', ['daily', 'weekly', 'monthly', 'custom']);
            $table->date('invoice_frequency_start_date')->nullable();
            $table->date('invoice_frequency_end_date')->nullable();
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
        Schema::dropIfExists('billing_settings');
    }
};

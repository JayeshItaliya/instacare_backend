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
        Schema::create('user_other_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->where('type', 4)->onDelete('cascade');
            $table->string('driver_license_number');
            $table->string('driver_license_status');
            $table->string('ssn_tax_id');
            $table->string('uniform_size');
            $table->string('emr_contact_name');
            $table->string('emr_contact_phone');
            $table->string('emr_contact_relationship');
            $table->string('emr_contact_license_number');
            $table->string('emr_contact_miles');
            $table->boolean('emp_w4');
            $table->boolean('emp_verification');
            $table->boolean('emp_background');
            $table->boolean('emp_direct');
            $table->boolean('emp_health_ins');
            $table->boolean('emp_8850');
            $table->boolean('emp_crp');
            $table->boolean('emp_handbook');
            $table->boolean('imm_tb_test');
            $table->date('start_tb_test_date');
            $table->date('end_tb_test_date');
            $table->date('imm_covid19_date');
            $table->boolean('imm_employee');
            $table->boolean('imm_religious');
            $table->boolean('imm_medical');
            $table->enum('payroll_cycle', ['weekly', 'daily'])->default(null);
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
        Schema::dropIfExists('user_other_infos');
    }
};

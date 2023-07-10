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
        Schema::create('user_notification_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('user_type')->comment('1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee');
            $table->boolean('text')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('in_app')->nullable();
            $table->boolean('text_confirm_shifts')->nullable();
            $table->boolean('text_schedule_shifts')->nullable();
            $table->boolean('text_cancelled_shifts')->nullable();
            $table->boolean('text_deleted_shifts')->nullable();
            $table->boolean('text_timecard_processed')->nullable();
            $table->boolean('text_late_clock_in')->nullable();
            $table->boolean('text_late_clock_out')->nullable();
            $table->boolean('text_shift_posted_by_instacare')->nullable();
            $table->boolean('text_shift_posted_by_facilitites')->nullable();
            $table->boolean('text_arriving_late')->nullable();
            $table->boolean('text_arriving_late_reported_by_employee')->nullable();
            $table->boolean('text_requested_to_work_at_a_certain_facility')->nullable();
            $table->boolean('text_message_sent')->nullable();
            $table->boolean('text_message_receive')->nullable();
            $table->boolean('text_person_added')->nullable();
            $table->boolean('text_facility_added')->nullable();
            $table->boolean('text_member_added')->nullable();
            $table->boolean('text_documents_uploaded')->nullable();
            $table->boolean('text_setting_changed')->nullable();
            $table->boolean('text_report_generated')->nullable();
            $table->boolean('text_support_request')->nullable();
            $table->boolean('text_change_in_billing_parameters')->nullable();
            $table->boolean('text_email_template_added')->nullable();
            $table->boolean('text_email_template_edited')->nullable();
            $table->boolean('text_email_and_text_template_added')->nullable();
            $table->boolean('text_email_and_text_template_edited')->nullable();
            $table->boolean('text_points_added')->nullable();
            $table->boolean('text_points_reason_added')->nullable();
            $table->boolean('text_shift_completed')->nullable();
            $table->boolean('text_call_of_shift')->nullable();
            $table->boolean('text_unassigned_shift')->nullable();
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
        Schema::dropIfExists('user_notification_settings');
    }
};

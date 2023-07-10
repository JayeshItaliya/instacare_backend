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
        Schema::create('template_settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1=Email, 2=Text');
            $table->string('subject');
            $table->longText('quick_message');
            $table->boolean('is_active')->default(1)->comment('0=false,1=true');
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
        Schema::dropIfExists('template_settings');
    }
};

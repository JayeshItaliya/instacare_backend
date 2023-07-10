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
        Schema::create('news_settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1 = For Instacare Staff,2 = For Facilities,3 = For Employees,4 = For All');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('news_settings');
    }
};

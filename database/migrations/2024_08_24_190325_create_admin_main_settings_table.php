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
        Schema::create('admin_main_settings', function (Blueprint $table) {
            $table->id();
            $table->string("company_name")->unique();
            $table->string("company_code");
            $table->string("main_branch_address");
            $table->string("phone");
            $table->integer("updated_by")->nullable();
            $table->timestamp("created_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_main_settings');
    }
};

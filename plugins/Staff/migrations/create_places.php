<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('staff_places', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('type')->index()->nullable();
            $table->string('status')->index()->default('active');
            $table->integer('group_id')->index()->nullable();
            $table->text('description')->index()->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('staff_place_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_places');
    }
};

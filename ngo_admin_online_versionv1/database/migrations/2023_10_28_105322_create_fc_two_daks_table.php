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
        Schema::create('fc_two_daks', function (Blueprint $table) {
            $table->id();
            $table->string('sender_admin_id')->nullable();
            $table->string('receiver_admin_id')->nullable();
            $table->string('fc_two_status_id')->nullable();
            $table->string('original_recipient')->nullable();
            $table->string('copy_of_work')->nullable();
            $table->string('informational_purposes')->nullable();
            $table->string('attraction_attention')->nullable();
            $table->string('dak_detail_id')->nullable();
            $table->string('status')->nullable();
            $table->string('nothi_jat_id')->nullable();
            $table->string('nothi_jat_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fc_two_daks');
    }
};

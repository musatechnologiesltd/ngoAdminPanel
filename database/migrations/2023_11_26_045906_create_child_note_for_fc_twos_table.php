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
        Schema::create('child_note_for_fc_twos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_note_for_fc_two_id')->unsigned();
            $table->foreign('parent_note_for_fc_two_id')->references('id')->on('parent_note_for_fc_twos')->onDelete('cascade');
            $table->string('serial_number');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_note_for_fc_twos');
    }
};

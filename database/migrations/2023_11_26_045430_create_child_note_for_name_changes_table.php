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
        Schema::create('child_note_for_name_changes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parentnote_name_change_id')->unsigned();
            $table->foreign('parentnote_name_change_id')->references('id')->on('parent_note_for_name_changes')->onDelete('cascade');
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
        Schema::dropIfExists('child_note_for_name_changes');
    }
};

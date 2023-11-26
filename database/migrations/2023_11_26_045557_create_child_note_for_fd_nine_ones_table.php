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
        Schema::create('child_note_for_fd_nine_ones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('p_note_for_fd_nine_one_id')->unsigned();
            $table->foreign('p_note_for_fd_nine_one_id')->references('id')->on('parent_note_for_fd_nine_ones')->onDelete('cascade');
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
        Schema::dropIfExists('child_note_for_fd_nine_ones');
    }
};

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
        Schema::create('parent_note_for_fd_sevens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_seven_doc_present_id')->unsigned();
            $table->foreign('fd_seven_doc_present_id')->references('id')->on('fd_seven_doc_presents')->onDelete('cascade');
            $table->string('serial_number');
            $table->string('subject');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_note_for_fd_sevens');
    }
};

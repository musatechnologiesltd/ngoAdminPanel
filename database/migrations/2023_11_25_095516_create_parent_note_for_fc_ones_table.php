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
        Schema::create('parent_note_for_fc_ones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fc_one_doc_present_id')->unsigned();
            $table->foreign('fc_one_doc_present_id')->references('id')->on('fc_one_doc_presents')->onDelete('cascade');
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
        Schema::dropIfExists('parent_note_for_fc_ones');
    }
};

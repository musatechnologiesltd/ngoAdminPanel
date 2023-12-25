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
        Schema::create('fc_two_office_saroks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_note_for_fc_two_id')->unsigned();
            $table->foreign('parent_note_for_fc_two_id')->references('id')->on('parent_note_for_fc_twos')->onDelete('cascade');
            $table->text('office_subject');
            $table->text('office_sutro')->nullable();
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fc_two_office_saroks');
    }
};

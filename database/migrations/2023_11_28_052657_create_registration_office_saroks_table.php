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
        Schema::create('registration_office_saroks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_note_regid')->unsigned();
            $table->foreign('parent_note_regid')->references('id')->on('parent_note_for_registrations')->onDelete('cascade');
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
        Schema::dropIfExists('registration_office_saroks');
    }
};

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
        Schema::create('renew_office_saroks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_note_for_renew_id')->unsigned();
            $table->foreign('parent_note_for_renew_id')->references('id')->on('parent_note_for_renews')->onDelete('cascade');
            $table->string('office_subject');
            $table->string('office_sutro')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renew_office_saroks');
    }
};
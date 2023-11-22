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
        Schema::create('fd_three_doc_presents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_three_dak_id')->unsigned();
            $table->foreign('fd_three_dak_id')->references('id')->on('fd_three_daks')->onDelete('cascade');
            $table->string('document_branch');
            $table->string('document_type_id');
            $table->string('document_number');
            $table->string('document_year');
            $table->string('document_class');
            $table->string('document_subject');
            $table->string('sender');
            $table->string('receiver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fd_three_doc_presents');
    }
};

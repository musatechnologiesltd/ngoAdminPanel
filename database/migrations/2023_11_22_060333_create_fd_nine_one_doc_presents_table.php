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
        Schema::create('fd_nine_one_doc_presents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ngo_f_d_nine_one_dak_id')->unsigned();
            $table->foreign('ngo_f_d_nine_one_dak_id')->references('id')->on('ngo_f_d_nine_one_daks')->onDelete('cascade');
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
        Schema::dropIfExists('fd_nine_one_doc_presents');
    }
};

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
        Schema::create('nothi_prapoks', function (Blueprint $table) {
            $table->id();
            $table->string('nothiId');
            $table->string('nijOfficeId')->nullable();
            $table->string('otherOfficerName')->nullable();
            $table->string('otherOfficerDesignation')->nullable();
            $table->string('otherOfficerBranch')->nullable();
            $table->string('otherOfficerEmail')->nullable();
            $table->string('otherOfficerPhone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nothi_prapoks');
    }
};

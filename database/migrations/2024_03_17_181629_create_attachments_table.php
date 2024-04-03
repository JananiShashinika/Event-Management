<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('attachments')) {
        Schema::create('attachments', function (Blueprint $table) {
            // Define your table structure here


        $table->id();
        // Other attachment columns
        $table->unsignedBigInteger('checklist_id');
        $table->timestamps();

        $table->foreign('checklist_id')->references('id')->on('check_lists')->onDelete('cascade');
    });
}
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};

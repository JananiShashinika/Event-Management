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


        if (!Schema::hasTable('new_event')) {
            Schema::create('new_event', function (Blueprint $table) {
                // Define your table structure here
            $table->id();
            $table->string('event_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('coordinator');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_event');
    }
};


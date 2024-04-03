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
        Schema::create('annual_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('event_type_id');
            $table->integer('coordinator_id');
            $table->integer('sp_note_id');
            $table->timestamps();
        });

        //php artisan migrate --path=/database/migrations/{migration_file_name}.php
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_events');
    }
};

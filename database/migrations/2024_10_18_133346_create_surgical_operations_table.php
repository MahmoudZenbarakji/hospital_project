<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createsurgicaloperationsTable extends Migration
{
    public function up()
    {
        Schema::create('surgical_operations', function (Blueprint $table) {
            $table->id();
            $table->string('operation_name');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->dateTime('scheduled_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surgeries');
    }
}

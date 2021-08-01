<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id');
            $table->string('type', 10)->comment('title,subtitle,excerpt,image');
            $table->text('value');
            $table->timestamp('created_at');

            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_data');
    }
}

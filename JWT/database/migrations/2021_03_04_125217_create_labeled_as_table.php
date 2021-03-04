<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabeledAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labeled_as', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('label_id');

            $table->foreign('task_id')->references('id')->on('task');
            $table->foreign('label_id')->references('id')->on('label');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labeled_as');
    }
}

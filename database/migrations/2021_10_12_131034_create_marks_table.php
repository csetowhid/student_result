<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('marks');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->foreign('subject_id')
            ->references('id')
            ->on('subjects')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}

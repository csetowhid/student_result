<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassIdFieldToMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')
                    ->after('id')
                    ->nullable();

            $table->foreign('class_id')
            ->references('id')
            ->on('studentclasses')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign('marks_class_id_foreign');
            $table->dropColumn('class_id');
        });
    }
}

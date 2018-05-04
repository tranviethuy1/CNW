<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imformations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('male')->default(1);
            $table->date('birth');
            $table->string('avatar')->nullable();
            $table->integer('id_employee')->unsigned();
            $table->foreign('id_employee')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imformations', function (Blueprint $table) {
            Schema::dropIfExists('imformations');
        });
    }
}

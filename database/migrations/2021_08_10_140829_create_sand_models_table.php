<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSandModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sand_models', function (Blueprint $table) {
            $path = public_path().'/files/';
            File::makeDirectory($path,0777, true, true);
            $table->bigIncrements('id');
            $table->text('url');
            $table->text('filesize');
            $table->text('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sand_models');
    }
}

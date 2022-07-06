<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectfields', function (Blueprint $table) {
            $table->id('field_id');
            $table->string('field_name');
            $table->unsignedBigInteger('field_type');
            $table->unsignedBigInteger('project_id');

            $table->foreign('field_type')->references('type_id')->on('fieldtypes')->onDelete('cascade');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
};

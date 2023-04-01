<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('title');
            $table->string('status')->nullable();
            $table->integer('isDeleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('client_id')
              ->references('id')
              ->on('clients')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

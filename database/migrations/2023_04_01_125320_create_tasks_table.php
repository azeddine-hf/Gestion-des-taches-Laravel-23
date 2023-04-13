<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('desc_task')->nullable();
            $table->string('status')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('property')->nullable();
            $table->integer('id_user');
            $table->integer('id_projet');
            $table->integer('is_delete')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_projet')
              ->references('id')
              ->on('projects')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->foreign('id_user')
              ->references('id')
              ->on('users')
              ->onUpdate('cascade')
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
        Schema::dropIfExists('tasks');
    }
}

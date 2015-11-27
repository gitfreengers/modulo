<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateExampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example', function (Blueprint $table) {
            $table->increments('id')->comment('Unique identifier');
            $table->integer('user_id')->comment('User who added the TODO');
            $table->boolean('completed')->comment('Status of the TODO');
            $table->text('todo')->comment('The actual todo');
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
        Schema::drop('todos');
    }
}

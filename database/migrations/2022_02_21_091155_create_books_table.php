<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('isbn');
            $table->integer('category_id');
            $table->integer('parent_id');
            $table->integer('publisher_id');
            $table->string('condition');
            $table->string('content');
            $table->string('description');
            $table->integer('num_pages');
            $table->integer('quantity');
            $table->integer('edition');
            $table->float('price');
            $table->date('date_published')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamps();
            $table->softDeletes(); // add
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

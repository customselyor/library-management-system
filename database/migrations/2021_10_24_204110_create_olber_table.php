<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olber', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kitobxon_id')->nullable();
            $table->foreign('kitobxon_id')
                ->references('id')->on('users')
                ->onDelete('set null');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onDelete('set null');
            $table->unsignedBigInteger('book_inventar_id')->nullable();
            $table->foreign('book_inventar_id')
                ->references('id')->on('book_inventar_lists')
                ->onDelete('set null');
            // status
            // 0=>uchirilgan
            // 1=>berilgan
            // 2=>qaytarib_olingan
            $table->integer('status')->default(1);
            $table->date('olgan_vaqti');
            $table->integer('olgan_yil')->default(0);
            $table->integer('olgan_oy')->default(0);
            $table->integer('olgan_kun')->default(0);

            $table->integer('nechchi_kun')->default(10);

            $table->date('qaytarish_vaqti')->nullable();
            $table->integer('qaytarish_yil')->default(0);
            $table->integer('qaytarish_oy')->default(0);
            $table->integer('qaytarish_kun')->default(0);

            $table->date('qaytargan_vaqti')->nullable();
            $table->integer('qaytargan_yil')->default(0);
            $table->integer('qaytargan_oy')->default(0);
            $table->integer('qaytargan_kun')->default(0);

            $table->unsignedBigInteger('fakultet_id')->nullable();
            $table->foreign('fakultet_id')
                ->references('id')->on('faculties')
                ->onDelete('set null');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('set null');
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
        Schema::dropIfExists('olber');
    }
}
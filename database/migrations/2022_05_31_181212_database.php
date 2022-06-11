<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('t_post');
        Schema::dropIfExists('t_commentPost');
        Schema::dropIfExists('t_order');
        Schema::dropIfExists('t_order_detail');
        Schema::dropIfExists('t_contact');
        Schema::dropIfExists('t_user');
        Schema::dropIfExists('t_category');
        Schema::dropIfExists('t_product');
        Schema::dropIfExists('t_product_inventory');

        Schema::create('t_post', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_user');
            $table->string('m_title',255);
            $table->text('m_thumnails');
            $table->text('m_content');
            $table->integer('m_view');
            $table->timestamps();
            $table->foreign('m_id_user')->references('id')->on('t_user');
        });
        Schema::create('t_commentPost', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_post');
            $table->unsignedInteger('m_id_user');
            $table->integer('m_id_parent');
            $table->text('m_content');
            $table->boolean('m_status')->default(0);
            $table->timestamps();
            $table->foreign('m_id_post')->references('id')->on('t_post');
            $table->foreign('m_id_user')->references('id')->on('t_user');
        });
        Schema::create('t_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_user')->nullable();
            $table->string('m_name',255);
            $table->string('m_email',255);
            $table->string('m_address',255);
            $table->string('m_phone',15);
            $table->text('m_note')->nullable();
            $table->double('m_total_price');
            $table->boolean('m_status_ship')->default(0);
            $table->boolean('m_status_pay')->default(0);
            $table->boolean('m_status')->default(0);
            $table->timestamps();
            $table->foreign('m_id_user')->references('id')->on('t_user');
        });
        Schema::create('t_order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_order');
            $table->unsignedInteger('m_id_product');
            $table->double('m_price');
            $table->integer('m_quanti');
            $table->string('m_product_name',255);
            $table->foreign('m_id_order')->references('id')->on('t_order');
            $table->foreign('m_id_product')->references('id')->on('t_product');
        });
        Schema::create('t_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_name',255);
            $table->string('m_phone',15);
            $table->string('m_email',255);
            $table->string('m_title',255);
            $table->text('m_content')->nullable();
            $table->text('m_reply')->nullable();
            $table->timestamps();
        });
        Schema::create('t_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('m_username',255);
            $table->text('m_password');
            $table->string('m_name',255)->nullable();
            $table->string('m_phone',15);
            $table->boolean('m_role')->default(0);
            $table->string('m_address',255)->nullable();
            $table->text('m_avatar')->nullable();
            $table->boolean('m_status')->default(0);
            $table->timestamps();
        });
        Schema::create('t_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_id_parent');
            $table->string('m_title',255);
            $table->integer('m_index')->default(0);
        });
        Schema::create('t_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_category');
            $table->string('m_product_name',255);
            $table->string('m_short_description',255);
            $table->text('m_description');
            $table->json('m_picture');
            $table->double('m_price');
            $table->double('m_original_price');
            $table->integer('m_buy');
            $table->integer('m_view');
            $table->boolean('m_status')->default(0);
            $table->timestamps();
            $table->foreign('m_id_category')->references('id')->on('t_category');
        });
        Schema::create('t_product_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('m_id_product');
            $table->integer('m_quanti');
            $table->string('m_size',255);
            $table->foreign('m_id_product')->references('id')->on('t_product');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::enableForeignKeyConstraints();
    }
}

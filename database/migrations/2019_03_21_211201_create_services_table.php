<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('en_title');
            $table->string('ar_title');
            $table->string('en_subtitle');
            $table->string('ar_subtitle');
            $table->text('ar_description');
            $table->text('en_description');
            $table->integer('parent_id');
            $table->integer('quotation_id');
            $table->integer('active');
            $table->integer('company_id');
            $table->text('portal_link');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}

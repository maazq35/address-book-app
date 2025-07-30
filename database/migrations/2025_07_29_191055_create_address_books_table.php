<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('title'); // Home, Work etc.
        $table->string('contact_name');
        $table->string('contact_number');
        $table->string('address_line1')->nullable();
        $table->string('address_line2')->nullable();
        $table->string('address_line3')->nullable();
        $table->string('pincode');
        $table->string('city');
        $table->string('state');
        $table->string('country');
        $table->boolean('is_default_from')->default(false);
        $table->boolean('is_default_to')->default(false);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_books');
    }
}

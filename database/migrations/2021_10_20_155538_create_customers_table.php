<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',length:255);
            $table->string('phone',length:255);
            $table->string('address',length:255);
            $table->string('email',length:255);
            $table->text('content')->nullable();
            $table->text('shipping')->nullable();
            $table->string('giaohang',length:255);
            $table->string('thanhtoan',length:255);
            $table->string('magiaodich',length:255);
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
        Schema::dropIfExists('customers');
    }
}

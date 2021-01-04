<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('phone');
            $table->timestamp('next_payment_at')->nullable();
            $table->timestamp('next_debt_payment_at')->nullable();
            $table->bigInteger('debt')->default(0);
            $table->bigInteger('next_sum')->default(\App\User::SUBSCRIBE_SUM);
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
        Schema::dropIfExists('contacts');
    }
}

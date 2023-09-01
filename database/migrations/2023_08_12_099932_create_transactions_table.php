<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id_member')->on('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('event_id')->references('id')->on('events')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('pay_method');
            $table->integer('pay');
            $table->integer('unique_number')->unique();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('check_in')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}

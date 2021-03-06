<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('description', 200)->nullabe(false);
            $table->string('receipt_type', 50)->nullabe(false);
            $table->float('due', 10, 2)->nullabe(false);
            $table->float('paid', 10, 2)->nullabe(false);
            $table->float('balance', 10, 2)->nullabe(false);
            $table->foreignId('client_id')->constrained()->restrictOnDelete();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->string('extra_comentary', 100)->nullable();
            $table->boolean('paid_with_promotion');
            $table->date('created_at')->nullabe(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}

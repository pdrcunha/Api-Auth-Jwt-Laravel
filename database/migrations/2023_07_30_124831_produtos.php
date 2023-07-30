<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_products');
            $table->unsignedBigInteger('fk_user');
            $table->string('name',255);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('type');
            $table->integer('amount');
            $table->string('amount_type');
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('fk_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};

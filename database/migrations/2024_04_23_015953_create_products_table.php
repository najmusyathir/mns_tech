<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_id')->unique();
            $table->string('prod_title');
            $table->text('prod_desc');
            $table->string('prod_brand');
            $table->string('prod_type');
            $table->string('prod_pic');
            $table->decimal('prod_price', 8, 2);
            $table->integer('prod_stock');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type');
            $table->string('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('email_verified_at');
            $table->string('remember_token')->nullable()->change();
                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
            $table->dropColumn('phone_no');
            $table->dropColumn('address');
            $table->dropForeign(['cart_id']);
            $table->dropColumn('cart_id');
        });
    }
}


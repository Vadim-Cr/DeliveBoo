<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        // todo Colleghiamo la tabella users con restauarants, corr 1 to 1
        Schema::table('users', function (Blueprint $table) {

            // $table -> foreignId('restaurant_id') ->constrained();
            $table->foreignId('restaurant_id')->constrained();
        });

        // todo Colleghiamo la tabella dishes to restauarants, corr 1 to many
        Schema::table('dishes', function (Blueprint $table) {

            $table->foreignId('restaurant_id')->constrained();
        });

        // todo Colleghiamo la tabella orders to restauarants , corr 1 to many
        Schema::table('orders', function (Blueprint $table) {

            $table->foreignId('restaurant_id')->constrained();
        });

        // todo Colleghiamo la tabella restaurants to restaurants_typology, corr many to many (è la tabella ponte)
        Schema::table('restaurant_typology', function (Blueprint $table) {

            $table->foreignId('restaurant_id')->constrained();
            $table->foreignId('typology_id')->constrained();
        });

        // todo Colleghiamo la tabella dish to dish_order, corr many to many (è la tabella ponte)
        Schema::table('dish_order', function (Blueprint $table) {

            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()


    {
        // todo down users to restaurants
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });

        // todo down dishes to restaurants
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });

        // todo down orders to restaurants
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });

        // todo down della tabella ponte tra restaurants e typologies
        Schema::table('restaurant_typology', function (Blueprint $table) {

            // ? down la tabella ponte ha bisogno di droppare gli id delle due tabelle che collega
            $table->dropForeign('restaurant_typology_restaurant_id_foreign');
            $table->dropForeign('restaurant_typology_typology_id_foreign');

            $table->dropColumn('restaurant_id');
            $table->dropColumn('typology_id');
        });

        // todo down della tabella ponte tra orders e dishes
        Schema::table('dish_order', function (Blueprint $table) {

            // ? down la tabella ponte ha bisogno di droppare gli id delle due tabelle che collega
            $table->dropForeign('dish_order_dish_id_foreign');
            $table->dropForeign('dish_order_order_id_foreign');

            $table->dropColumn('dish_id');
            $table->dropColumn('order_id');
        });
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultBillingInvoiceAddressesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('billing_address_id')->unsigned()->nullable();
            $table->integer('shipping_address_id')->unsigned()->nullable();

            $table->foreign('billing_address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('set null');
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
            $table->dropForeign(['billing_address_id']);
            $table->dropForeign(['shipping_address_id']);

            $table->dropColumn(['billing_address_id', 'shipping_address_id']);
        });
    }
}

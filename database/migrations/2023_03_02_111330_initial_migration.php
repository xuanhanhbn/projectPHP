<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("key")->unique();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
        });
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("key")->unique();
            $table->string("description")->nullable();
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description")->nullable();
            $table->unsignedDecimal("price", 12, 4)->default(0);
            $table->unsignedInteger("in_stock")->default(0);
            $table->unsignedInteger("sold")->default(0);
            $table->unsignedInteger("rating")->default(0);
            $table->unsignedInteger("comment")->default(0);
            $table->string("thumbnail")->nullable();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("recipient_id");
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("recipient_id")->references("id")->on("recipients");
        });
        Schema::create('productImages', function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->unsignedBigInteger("product_id");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
        });
        Schema::create('productRatings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("rate");
            $table->string("comment")->nullable();
            $table->unsignedBigInteger("product_id");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
        });
        Schema::create('orders', function (Blueprint $table){
            $table->id();
            $table->enum("order_status",["Prepared","Sent","Shipped","Received","Succeed","Declined","Refunded","Exchanged"]);
            $table-> unsignedDecimal("total",10 ,0)->default(0);
            $table->enum("payment_type",["Cod","Paypal"]);
            $table->boolean("payment_status")->default(false);
            $table->string("shipping_address");
            $table->string("receiver_contact");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
        Schema::create('subOrders', function (Blueprint $table){
            $table->id();
            $table->unsignedInteger("quantity")->default(1);
            $table->unsignedDecimal("sub_total",10 ,0);
            $table->enum("status",["pending","succeeded","declined","exchanged","refunded"]);
            $table->timestamps();
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")->references("id")->on("orders");
        });
        Schema::create('roles', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("user_id")->unique();
            $table->enum("role",["admin","employee","user"]);
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
        Schema::create('userCarts', function (Blueprint $table){
            $table->id();
            $table->unsignedInteger("quantity")->default(1);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("product_id");
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("product_id")->references("id")->on("products");
        });
        Schema::create('userInfos', function (Blueprint $table){
            $table->id();
            $table->unsignedInteger("age")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->string("fullname")->nullable();
            $table->string("address")->nullable();
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productImages');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('company_id');
            $table->string('order_code');
            $table->string('order_status');
            $table->string('payment_status');
            $table->bigInteger('total_price');
            $table->bigInteger('total_paid');
            $table->bigInteger('sale_id');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('sales_order_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('sale_orders_id');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('price')->nullable();
            $table->bigInteger('price_discount')->nullable();
            $table->string('status')->default('active')->index();
            $table->string('unit')->nullable();
            $table->string('product_code')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('product_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->string('file_path')->index();
            $table->string('type')->default('image');
            $table->tinyInteger('is_primary')->default(0);
            $table->timestamps();

        });
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->bigInteger('category_id')->index();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('description')->index();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
        Schema::dropIfExists('sales_order_product');
        Schema::dropIfExists('product_file');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('categories');
    }
};

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

        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->default('product')->index();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->bigInteger('cost_price')->nullable();
            $table->bigInteger('sell_price')->nullable();
            $table->bigInteger('stock')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->string('status')->default('active')->index();
            $table->string('sku')->nullable();
            $table->string('unit')->nullable();
            $table->string('product_code')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('note')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('ecommerce_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('value')->index();
            $table->string('type')->index();
        });
        Schema::create('ecommerce_product_variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->string('name')->index();
            $table->string('value')->index();
        });
        Schema::create('ecommerce_product_cost_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->bigInteger('item_id')->index();
            $table->string('item_class')->index();
            $table->bigInteger('quantity')->index();
        });
        Schema::table('ecommerce_product_variants', function (Blueprint $table) {
            $table->unique(['name', 'product_id']);
        });
        Schema::create('ecommerce_product_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->string('file_id')->index();
            $table->tinyInteger('is_primary')->default(0);
            $table->timestamps();
        });
        Schema::create('ecommerce_product_taxonomy', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->index();
            $table->bigInteger('taxonomy_id')->index();
        });
        Schema::create('ecommerce_taxonomies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('type')->index();
            $table->integer('parent_id')->index();
            $table->text('description')->index();
            $table->timestamps();

        });
     

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_product_file');
        Schema::dropIfExists('ecommerce_products');
        Schema::dropIfExists('ecommerce_attributes');
        Schema::dropIfExists('ecommerce_product_variants');
        Schema::dropIfExists('ecommerce_taxonomies');
        Schema::dropIfExists('ecommerce_product_taxonomy');
    }
};

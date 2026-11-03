<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('garment_orders', function (Blueprint $table) {
        $table->id();

        $table->string('order_number')->unique();
        $table->string('po_number')->nullable();
        $table->string('buyer_name');
        $table->string('style_number')->nullable();
        $table->string('product_name');

        $table->string('order_type')->nullable();

        $table->unsignedInteger('order_qty');
        $table->decimal('unit_price', 12, 2);
        $table->decimal('total_value', 15, 2);

        $table->date('order_date');
        $table->date('ex_factory_date')->nullable();

        $table->string('status')->default('Pending');

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_orders');
    }
};

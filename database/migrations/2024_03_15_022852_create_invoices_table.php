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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('company_name');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->decimal('sub_total',8,2)->default(0.00);
          $table->string('discount_type')->nullable();
            $table->string('discount_value',8,2)->default(0.00);
            $table->string('vat_value', 8, 2)->default(0.00);
            $table->string('shipping', 8, 2)->default(0.00);
            $table->string('total_due', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
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
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('VehicleID')->on('vehicles')->onDelete('cascade');
           
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // $table->string('Membership')->nullable();
            // $table->string('Make')->nullable();
            // $table->string('Model')->nullable();
            // $table->string('Registration')->nullable();
            // $table->string('EngineNumber')->nullable();
            // $table->string('Chassis')->nullable();
            // $table->string('Color')->nullable();
            $table->integer('serial_of_reg_book');
            $table->string('serial_of_reg_challan');
            $table->string('deal_locked');

            $table->date('regd_book_date');
            $table->date('regd_file_date');
            $table->date('documents_date');

            $table->boolean('jackrod')->default(false);
            $table->boolean('wheels_caps')->default(false);
            $table->boolean('service_book')->default(false);
            $table->boolean('tape_recorder')->default(false);
            $table->boolean('spare_wheel')->default(false);
            $table->boolean('warranty_books')->default(false);
            $table->boolean('lighter')->default(false);
            $table->boolean('air_conditioner')->default(false);

            $table->text('remarks')->nullable();

            $table->string('car_touchups')->nullable();
            $table->string('balance_inspection')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_address')->nullable();
            $table->decimal('balance_rs', 10, 2)->nullable();
            $table->decimal('advance_rs', 10, 2)->nullable();
            $table->decimal('balance_paid', 10, 2)->nullable();
            $table->tinyInteger('no_of_installment')->default(1)->nullable();
            $table->decimal('installment_amount', 10, 2)->nullable();
            $table->decimal('paid_amount', 10,2)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_orders');
    }
};

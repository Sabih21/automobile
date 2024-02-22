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
        Schema::create('purchase_orders', function (Blueprint $table) {

            $table->bigIncrements('id');
            // $table->unsignedBigInteger('vehicle_id');
            // $table->foreign('vehicle_id')->references('VehicleID')->on('vehicles')->onDelete('cascade');
           
            $table->string('membership_no');
            $table->string('make');
            $table->string('model');
            $table->string('regis_no');
            $table->integer('serial_of_reg_book');
            $table->string('engine_no');
            $table->string('chassis_no');
            $table->string('colour');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};

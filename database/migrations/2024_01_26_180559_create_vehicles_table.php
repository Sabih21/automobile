<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{   

    

    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('VehicleID');
            $table->string('Make');
            $table->string('Model');
            $table->integer('Year');
            $table->string('Color');
            $table->string('VIN');
            $table->decimal('Amount');
            $table->string('LicensePlate');
            $table->date('PurchaseDate');
            $table->decimal('PurchasePrice');
            $table->decimal('CurrentValue');
            $table->string('Condition');
            $table->string('FuelType');
            $table->integer('Mileage');
            $table->string('EngineNumber');
            $table->string('Transmission');
            $table->string('ManufacturerID');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};

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
            $table->integer('Registration')->nullable()->unique();//new
            $table->integer('Amount');
            $table->string('LicensePlate')->unique();
            $table->integer('Chassis');//new
            $table->string('Condition');
            $table->string('FuelType');
            $table->integer('Mileage');
            $table->string('EngineNumber');
            $table->string('Membership');//new
            $table->text('Detail_description'); //new

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};

<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificationsTable extends Migration
{
    public function up()
    {
        Schema::create('modifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('part_name');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->dateTime('date_time');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('vehicle_id')->references('VehicleID')->on('vehicles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modifications');
    }
}

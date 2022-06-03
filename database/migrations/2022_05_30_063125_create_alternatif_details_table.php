<?php

use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternatifDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade'); 
            $table->foreignIdFor(Criteria::class)->nullable(); 
            $table->foreignId('subcriteria_id')->nullable()->references('id')->on('subcriterias')->onDelete('cascade');
         ;
          

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif_details');
    }
}

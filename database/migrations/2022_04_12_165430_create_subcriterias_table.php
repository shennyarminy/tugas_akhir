<?php

use App\Models\Criteria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcriterias', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->string('nama_subcriteria');
            $table->float('nilai_subcriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcriterias');
    }
}

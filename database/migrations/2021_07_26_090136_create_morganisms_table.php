<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMorganismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('morganisms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('micro_parent_category_id');
            $table->foreign('micro_parent_category_id', 'fk_mic_pa_cat_morganisms')
                ->references('id')->on('micro_parent_category')
                ->onDelete('cascade');

            $table->integer('counter')->nullable();
            $table->integer('strain_in_collection')->nullable();
            $table->string('date_of_isolation')->nullable();
            $table->string('date_of_receipt')->nullable();
            $table->integer('halophility')->nullable();
            $table->integer('acidophility')->nullable();
            $table->integer('alcaliphility')->nullable();
            $table->integer('thermophility')->nullable();

            $table->unsignedBigInteger('source_location_isolation_id')->nullable();
            $table->foreign('source_location_isolation_id', 'fk_isol')
                ->references('id')->on('source_location_isolations')
                ->onDelete('set null');

            $table->unsignedBigInteger('identified_by_id')->nullable();
            $table->foreign('identified_by_id', 'fk_ident_by_morganisms')
                ->references('id')->on('m_authors')
                ->onDelete('set null');

            $table->unsignedBigInteger('deposited_by_id')->nullable();
            $table->foreign('deposited_by_id', 'fk_depos_by_morganisms')
                ->references('id')->on('m_authors')
                ->onDelete('set null');
            $table->unsignedBigInteger('conditions_preservation_id')->nullable();
            $table->foreign('conditions_preservation_id', 'fk_cond_pres_morganisms')
                ->references('id')->on('condition_preservations')
                ->onDelete('set null');
            $table->unsignedBigInteger('conditions_growth_id')->nullable();
            $table->foreign('conditions_growth_id', 'fk_cond_growths_morganisms')
                ->references('id')->on('conditions_growths')
                ->onDelete('set null');

            $table->unsignedBigInteger('growth_salt_presence_id')->nullable();
            $table->foreign('growth_salt_presence_id', 'fk_gro_s_pres_morganisms')
                ->references('id')->on('growths')
                ->onDelete('set null');

            $table->unsignedBigInteger('growth_ph_lt_7_id')->nullable();
            $table->foreign('growth_ph_lt_7_id', 'fk_gro_ph_lt7_morganisms')
                ->references('id')->on('growths')
                ->onDelete('set null');
            $table->unsignedBigInteger('growth_ph_mt_7_id')->nullable();
            $table->foreign('growth_ph_mt_7_id', 'fk_gro_ph_mt7_morganisms')
                ->references('id')->on('growths')
                ->onDelete('set null');

            $table->unsignedBigInteger('growth_higher_t_id')->nullable();
            $table->foreign('growth_higher_t_id', 'fk_gro_h_t_morganisms')
                ->references('id')->on('growths')
                ->onDelete('set null');

            $table->unsignedBigInteger('biotechnological_features_id')->nullable();
            $table->foreign('biotechnological_features_id', 'fk_biot_fe_morganisms')
                ->references('id')->on('biotechnological_features')
                ->onDelete('set null');
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
        });

        Schema::create('morganisms_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();
            // Foreign key to the main model
            $table->unsignedBigInteger('morganisms_id');
            $table->foreign('morganisms_id', 'fk_morganisms')
                ->references('id')->on('morganisms')
                ->onDelete('cascade');
            // Actual fields you want to translate
            $table->string('title');
            $table->string('slug');
            $table->string('strain_label')->nullable();
            $table->string('enzymatic_activity_extreme_conditions_protein')->nullable();
            $table->longText('characteristics_produced_compounds')->nullable();
            $table->string('pathogenicity')->nullable();
            $table->string('comments')->nullable();

            $table->longText('body')->nullable();
            $table->longText('description')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('morganisms');
    }
}

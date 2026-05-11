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
        Schema::create('households', function (Blueprint $table) {
            // Primary Key
            $table->id('household_id');
            
            // Foreign Key: Links to the person (e.g., BHW) who encoded the data
            $table->foreignId('recorded_by')->constrained('users')->onDelete('cascade');
            
            // Basic Household Details
            $table->string('household_head');
            $table->string('house_no')->nullable();
            $table->string('street_name');
            $table->string('sitio'); // Important for LGU monitoring
            $table->string('contact_number')->nullable();
            
            // Geospatial Data (Crucial for appearing on the map)
            // Use decimal(10,8) and (11,8) for GPS precision
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            
            // Vulnerability Monitoring Fields (Disaster Preparedness)
            $table->integer('total_family_members')->default(1);
            $table->integer('total_pwd')->default(0);
            $table->integer('total_seniors')->default(0);
            $table->integer('total_infants')->default(0); // Children under 5
            $table->boolean('has_pregnant_member')->default(false);
            
            // Disaster Preparedness Assessment Fields
            $table->string('household_number')->unique();
            $table->string('evacuation_area')->nullable();
            $table->string('preparedness_status')->nullable();
            $table->integer('score')->nullable();
            $table->datetime('last_assessed')->nullable();
            
            // Standard Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};

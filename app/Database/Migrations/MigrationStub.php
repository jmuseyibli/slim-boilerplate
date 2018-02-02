<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class $className extends $baseClassName {
    
    public function up() {
        $this->schema->create('TABLE_NAME', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        
        $this->schema->table('TABLE_NAME', function(Blueprint $table) {
            //
        });
    }
    
    public function down() {
        $this->schema->drop('TABLE_NAME');
        
        $this->schema->create('TABLE_NAME', function(Blueprint $table) {
            //
        });
    }
    
}
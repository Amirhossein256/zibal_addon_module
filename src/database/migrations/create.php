<?php

namespace Amirhossein256\Zibal\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class create
{

    public function run(): void
    {

        if (!Capsule::schema()->hasTable('zibal_settings')) {
            Capsule::schema()->create('zibal_settings', function ($table) {
                /** @var Blueprint $table */
                $table->string('key');
                $table->string('value');
                $table->engine = 'InnoDB';
            });
        }

        if (!Capsule::schema()->hasTable('zibal_users')) {
            Capsule::schema()->create('zibal_users', function ($table) {
                /** @var \Illuminate\Database\Schema\Blueprint $table */
                $table->integer('user_id');
                $table->string('full_name');
                $table->string('national_code')->nullable();
                $table->string('mobile');
                $table->date('birthday')->nullable();
                $table->boolean('verify');
                $table->timestamps();
                $table->engine = 'InnoDB';
            });
        }
    }
}



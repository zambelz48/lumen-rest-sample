<?php
/**
 * Created by PhpStorm.
 * User: nanda
 * Date: 2019-06-24
 * Time: 06:28
 */

namespace App\Providers;


use Faker\Provider\Uuid;
use Illuminate\Support\ServiceProvider;

class UniqueIDServiceProvider extends ServiceProvider
{

    private $models = [
        '\App\Models\Product'
    ];

    public function boot()
    {
        foreach ($this->models as $model) {
            $model::creating(function($m) {
                $m->_id = $this->generateUniqueID();
            });
        }

    }

    private function generateUniqueID() {

        $uuid = Uuid::uuid();
        $uniqueID = str_replace('-', '', $uuid);

        return substr($uniqueID, 0, -8);
    }

}
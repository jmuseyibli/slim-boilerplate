<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$config = $container['settings']['database'];
$capsule = new Capsule;
$capsule->addConnection($config);
$capsule->setAsGlobal();
$capsule->bootEloquent();
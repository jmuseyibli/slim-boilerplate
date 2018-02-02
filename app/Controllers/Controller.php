<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;
use GuzzleHttp\Client as Guzzle;


abstract class Controller
{
    protected $ci;

    public function __construct(ContainerInterface $container)
    {
        $this->ci = $container;
    }
}

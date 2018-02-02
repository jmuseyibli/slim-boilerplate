<?php namespace App\Controllers;

use App\Controllers\Controller;
use App\Controllers\Api\NewsController;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Service;
use App\Models\Update;

class MainController extends Controller {
    
    public function home(Request $request, Response $response, $args) {
        return $this->ci->view->render($response, 'home/main.twig', [
            'title' => 'Home'
        ]);
    }
    
}
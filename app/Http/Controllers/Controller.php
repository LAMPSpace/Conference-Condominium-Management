<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// Swagger demo

/**
 * @OA\Info(title="L5 Swagger API", version="0.1")
 * @OA\Server(url="http://localhost:8000/api")
 * @OA\PathItem(path="/api")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

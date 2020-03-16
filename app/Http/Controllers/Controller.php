<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller extends BaseController
{
    /**
     * @param array $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return Response
     */
    protected function json(array $data = [], int $status = 200, array $headers = [], $options = 0): Response
    {
        return response()->json($data, $status, $headers, $options);
    }
}

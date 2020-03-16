<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ReadModels\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * @param Authenticatable|User $user
     * @return Response
     */
    public function index(Authenticatable $user): Response
    {
        return $this->json($user->toArray());
    }

}

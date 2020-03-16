<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthorizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var AuthorizeService
     */
    private $service;

    /**
     * LoginController constructor.
     * @param Request $request
     * @param AuthorizeService $service
     */
    public function __construct(Request $request, AuthorizeService $service)
    {
        $this->request = $request;
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(): Response
    {
        $credentials = $this->validate($this->request, $this->getLoginRules());
        $response = $this->service->authorize($credentials);

        return $this->json($response);
    }

    /**
     * @return array
     */
    protected function getLoginRules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\FullName;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Hashing\HashManager;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /**
     * @var UserService
     */
    private $service;
    /**
     * @var HashManager
     */
    private $hashManager;

    /**
     * RegisterController constructor.
     * @param UserService $service
     * @param HashManager $hashManager
     */
    public function __construct(
        UserService $service,
        HashManager $hashManager
    ) {
        $this->service = $service;
        $this->hashManager = $hashManager;
    }

    /**
     * @param Request $request
     * @throws ValidationException
     * @throws Exception
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, $this->getRules());

        $email = new Email($request->get('email'));
        $fullName = new FullName($request->get('first_name'), $request->get('last_name'));
        $password = $this->hashManager->make($request->get('password'));

        $this->service->register($fullName, $email, $password);
    }

    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string|min:1',
            'last_name' => 'required|string|min:1',
            'password' => 'required|string|min:6',
        ];
    }
}

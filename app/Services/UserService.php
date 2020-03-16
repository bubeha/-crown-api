<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\FullName;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param FullName $fullName
     * @param Email $email
     * @param string $password
     * @throws Exception
     */
    public function register(FullName $fullName, Email $email, string $password)
    {
        $user = new User(Uuid::uuid4(), $fullName, $email, $password);

        $this->em->persist($user);
        $this->em->flush();
    }
}

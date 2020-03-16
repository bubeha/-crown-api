<?php

namespace App\Domain\ValueObjects;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Timestamp
 * @package App\Domain\ValueObjects
 * @ORM\Embeddable
 */
class Timestamp
{
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $updated_at;
}

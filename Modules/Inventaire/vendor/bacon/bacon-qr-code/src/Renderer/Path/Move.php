<?php
declare(strict_types = 1);

namespace BaconQrCode\Renderer\Path;

final class Move implements OperationInterface
{
    /**
     * @var float
     */
    private $x;

    /**
     * @var float
     */
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() : float
    {
        return $this->x;
    }

    public function getY() : float
    {
        return $this->y;
    }

    /**
     * @return self
     */
    public function translate(float $x, float $y) : OperationInterface
    {
<<<<<<< HEAD
        return new self($this->x + $x, $this->y + $y);
=======
        return new self($this->x + $x, $this->x + $y);
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
    }
}

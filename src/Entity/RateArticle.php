<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 */
class RateArticle extends Article
{
    /**
     * @ORM\Column(length="1")
     */
    private int $rate;
    /**
     * @ORM\Column(length="100")
     */
    private string $commentary;


    public function __construct(string $t, string $r, string $a, string $e, int $ra, string $co)
    {
        parent::__construct($t, $r, $a, $e);
        $this->rate = $ra;
        $this->string =$co;
    }

    /**
     * Get the value of rate
     *
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @param int $rate
     *
     * @return self
     */
    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of commentary
     *
     * @return string
     */
    public function getCommentary(): string
    {
        return $this->commentary;
    }

    /**
     * Set the value of commentary
     *
     * @param string $commentary
     *
     * @return self
     */
    public function setCommentary(string $commentary): self
    {
        $this->commentary = $commentary;

        return $this;
    }
}

<?php

namespace Zorbus\TrafficBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Redirect
 */
abstract class Redirect
{
    public function __toString()
    {
        return $this->getUrl();
    }
}

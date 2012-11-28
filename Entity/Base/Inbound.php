<?php

namespace Zorbus\TrafficBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inbound
 */
abstract class Inbound
{
    public function __toString()
    {
        return $this->getTargetUrl();
    }
}

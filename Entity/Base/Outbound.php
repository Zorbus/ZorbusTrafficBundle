<?php

namespace Zorbus\TrafficBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Outbound
 */
abstract class Outbound
{
    public function __toString()
    {
        return $this->getTargetUrl();
    }
}

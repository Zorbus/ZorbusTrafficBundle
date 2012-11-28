<?php

namespace Zorbus\TrafficBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inbound
 */
class Inbound extends Base\Inbound
{
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $source_url;

    /**
     * @var string
     */
    private $source_domain;

    /**
     * @var string
     */
    private $target_url;

    /**
     * @var string
     */
    private $target_domain;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $headers;

    /**
     * @var string
     */
    private $query;

    /**
     * @var boolean
     */
    private $valid;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Inbound
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set source_url
     *
     * @param string $sourceUrl
     * @return Inbound
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->source_url = $sourceUrl;
    
        return $this;
    }

    /**
     * Get source_url
     *
     * @return string 
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * Set source_domain
     *
     * @param string $sourceDomain
     * @return Inbound
     */
    public function setSourceDomain($sourceDomain)
    {
        $this->source_domain = $sourceDomain;
    
        return $this;
    }

    /**
     * Get source_domain
     *
     * @return string 
     */
    public function getSourceDomain()
    {
        return $this->source_domain;
    }

    /**
     * Set target_url
     *
     * @param string $targetUrl
     * @return Inbound
     */
    public function setTargetUrl($targetUrl)
    {
        $this->target_url = $targetUrl;
    
        return $this;
    }

    /**
     * Get target_url
     *
     * @return string 
     */
    public function getTargetUrl()
    {
        return $this->target_url;
    }

    /**
     * Set target_domain
     *
     * @param string $targetDomain
     * @return Inbound
     */
    public function setTargetDomain($targetDomain)
    {
        $this->target_domain = $targetDomain;
    
        return $this;
    }

    /**
     * Get target_domain
     *
     * @return string 
     */
    public function getTargetDomain()
    {
        return $this->target_domain;
    }

    /**
     * Set method
     *
     * @param string $method
     * @return Inbound
     */
    public function setMethod($method)
    {
        $this->method = $method;
    
        return $this;
    }

    /**
     * Get method
     *
     * @return string 
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set headers
     *
     * @param string $headers
     * @return Inbound
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    
        return $this;
    }

    /**
     * Get headers
     *
     * @return string 
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set query
     *
     * @param string $query
     * @return Inbound
     */
    public function setQuery($query)
    {
        $this->query = $query;
    
        return $this;
    }

    /**
     * Get query
     *
     * @return string 
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     * @return Inbound
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    
        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean 
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Inbound
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Inbound
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
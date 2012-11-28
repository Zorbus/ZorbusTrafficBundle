<?php

namespace Zorbus\TrafficBundle\EventListener;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Zorbus\TrafficBundle\Entity\Inbound;

class InboundListener
{
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $request = $event->getRequest();

        $referer = $request->headers->get('referer');
        $source = parse_url($referer);

        /* exclude links for same host so internal links won't be counted */
        if (!$referer || $source || $request->getHost() == $source['host'])
        {
            return;
        }

        $inbound = new Inbound();
        $inbound->setIp($request->getClientIp());
        $inbound->setTargetUrl($request->getUri());
        $inbound->setTargetDomain($request->getHost());
        $inbound->setSourceUrl($referer);
        $inbound->setSourceDomain($source['host']);
        $inbound->setMethod($request->getMethod());
        $inbound->setHeaders(json_encode($request->headers->all()));
        $inbound->setQuery(json_encode($request->query->all()));
        $inbound->setValid(true);

        $this->em->persist($inbound);
        $this->em->flush();
    }
}
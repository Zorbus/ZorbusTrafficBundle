<?php

namespace Zorbus\TrafficBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zorbus\TrafficBundle\Entity\Outbound;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function redirectAction($token, Request $request)
    {
        try
        {
            $em = $this->getDoctrine()->getManager();
            $redirect = $this
                            ->getDoctrine()
                            ->getRepository('ZorbusTrafficBundle:Redirect')
                            ->findOneBy(array('token' => $token, 'enabled' => true));

            $redirect->setHits(1+$redirect->getHits());

            $target = parse_url($redirect->getUrl());

            $outbound = new Outbound();
            $outbound->setSourceUrl($request->getUri());
            $outbound->setSourceDomain($request->getHost());
            $outbound->setTargetUrl($redirect->getUrl());
            $outbound->setTargetDomain($target['host']);
            $outbound->setMethod($request->getMethod());
            $outbound->setHeaders(json_encode($request->headers->all()));
            $outbound->setQuery(json_encode($request->query->all()));
            $outbound->setValid(true);
            $em->persist($outbound);

            $em->flush($outbound);
            $em->flush($redirect);

            return $this->redirect($redirect->getUrl());
        }
        catch(\Exception $e)
        {
            return $this->createNotFoundException('Invalid redirect token.');
        }
    }
}
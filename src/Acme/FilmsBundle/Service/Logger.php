<?php

namespace Acme\FilmsBundle\Service;

use Acme\FilmsBundle\Entity\Log;
use Acme\FilmsBundle\Event\LogEvent;

class Logger {
    public function log(LogEvent $event)
    {
        $log = new Log();
        $log->setMessage($event->getMessage());
        $em = $event->getEntityManager();
        $em->persist($log);
    }
}
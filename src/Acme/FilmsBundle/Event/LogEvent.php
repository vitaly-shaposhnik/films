<?php

namespace Acme\FilmsBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Doctrine\ORM\EntityManager;

class LogEvent extends Event
{
    protected $em;
    protected $entity;
    protected $message;

    public function __constructor(EntityManager $em, $entity, $message)
    {
        $this->em = $em;
        $this->entity = $entity;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}
<?php

namespace Acme\FilmsBundle\Service;

use Doctrine\ORM\EntityRepository;

class FilmsService
{
    protected $filmsRepository;
    protected $logger;

    public function __construct($filmsRepository/*,
                                LoggerInterface $logger*/)
    {
        $this->filmsRepository = $filmsRepository;
//        $this->logger = $logger;
    }

    public function query()
    {
//        $results = $this->filmsRepository->fetchLatest();
//        $this->logger->info(sprintf('Someone fetched %d films',
//            count($results)));
//
//        return $results;
    }
}
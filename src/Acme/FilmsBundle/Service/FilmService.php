<?php

namespace Acme\FilmsBundle\Service;

use Doctrine\ORM\EntityRepository;

class FilmService
{
    protected $filmRepository;
    protected $logger;

    public function __construct($filmRepository/*,
                                LoggerInterface $logger*/)
    {
        $this->filmRepository = $filmRepository;
//        $this->logger = $logger;
    }

    public function query()
    {
//        $results = $this->filmRepository->fetchLatest();
//        $this->logger->info(sprintf('Someone fetched %d film',
//            count($results)));
//
//        return $results;
    }
}
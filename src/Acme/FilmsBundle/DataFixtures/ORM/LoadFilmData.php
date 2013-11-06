<?php

namespace Rice\DeckKeeperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Acme\FilmsBundle\Entity\Film;

class LoadFilmData implements FixtureInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        $film = new Film();
        $film->setName('Шрамы Мирродина');
        $manager->persist($film);

        $manager->flush();
    }
}

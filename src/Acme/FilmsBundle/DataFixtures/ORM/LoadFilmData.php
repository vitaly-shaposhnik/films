<?php

namespace Acme\FilmsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Acme\FilmsBundle\Entity\Film;
use Acme\FilmsBundle\Entity\Category;
use Acme\FilmsBundle\Entity\Actor;
use Acme\FilmsBundle\Entity\Genre;


class LoadFilmData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Film #1
        $category = new Category();
        $category->setName('Веселые');
        $manager->persist($category);

        $actor1 = new Actor();
        $actor1->setName('Брэд Питт');
        $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setName('Деннис Фарина');
        $manager->persist($actor2);

        $genre = new Genre();
        $genre->setName('Криминал');
        $manager->persist($genre);

        $film = new Film();
        $film->path = 'http://s10.dotua.org/fsua_items/cover/00/18/55/2/00185595.jpg';
        $film->setName('Большой куш');
        $film->addCategorie($category);
        $film->addActor($actor1);
        $film->addActor($actor2);
        $film->addGenre($genre);
        $manager->persist($film);


        // Film #2
        $category = new Category();
        $category->setName('Для души');
        $manager->persist($category);

        $actor1 = new Actor();
        $actor1->setName('Джейсон Флеминг');
        $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setName('Винни Джонс');
        $manager->persist($actor2);

        $actor3 = new Actor();
        $actor3->setName('Вэс Блэквуд');
        $manager->persist($actor3);

        $genre2 = new Genre();
        $genre2->setName('Триллер');
        $manager->persist($genre2);

        $film = new Film();
        $film->path = 'http://s12.dotua.org/fsua_items/cover/00/09/96/2/00099639.jpg';
        $film->setName('Карты, деньги, два ствола');
        $film->addCategorie($category);
        $film->addActor($actor1);
        $film->addActor($actor2);
        $film->addActor($actor3);
        $film->addGenre($genre);
        $film->addGenre($genre2);
        $manager->persist($film);

        $manager->flush();
    }
}

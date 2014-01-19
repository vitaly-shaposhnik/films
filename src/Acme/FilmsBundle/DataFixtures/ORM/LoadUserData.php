<?php

namespace Acme\FilmsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Acme\FilmsBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('test.admin@gmail.comm');
        $user->setUsername('admin');
        $user->setPlainPassword('111111');
        $user->setSuperAdmin(true);
        $user->setEnabled(true);
        $manager->persist($user);

        $manager->flush();
    }
}

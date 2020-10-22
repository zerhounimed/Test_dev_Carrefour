<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous
        // voulons nos données
        $user = new User();
        $user->setUsername('toto');
        $password = $this->encoder->encodePassword($user, 'test');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();
    }
}

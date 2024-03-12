<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        $users = array();
        $admin_password = 'admin';

        for ($i = 0; $i < 4; $i++) {
            $users[$i] = new User();
            if ($i) {
                $users[$i]->setFirstname($faker->firstName);
                $users[$i]->setLastname($faker->lastName);
                $users[$i]->setEmail($faker->email);
                $users[$i]->setPassword($this->hasher->hashPassword($users[$i], $faker->password));
            } else {
                $users[$i]->setFirstname('admin');
                $users[$i]->setLastname('admin');
                $users[$i]->setEmail('comdroy@gmail.com');
                $users[$i]->setPassword($this->hasher->hashPassword($users[$i], $admin_password));
                $users[$i]->setRoles(['ROLE_ADMIN']);
            }
            $manager->persist($users[$i]);
        }

        $manager->flush();
    }
}
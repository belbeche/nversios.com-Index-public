<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AnnoncesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $Blog = new Blog();
            $Blog
                ->settITRE($faker->words(3, true))
                ->setContenu($faker->sentences(3, true))
                ->setAvis($faker->randomDigitNot(0,5));

            $manager->persist($Blog);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();

        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Movie;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            "Terror", "Romance", "Comedy", "Action", "Science Fiction"
        ];

        foreach ($categories as $item) {
            $category = new Category();
            $category->setName($item);
            $manager->persist($category);
        }
        
        $manager->flush();

        for ($i=0; $i<100;$i++) {

            $categories = $manager->getRepository(Category::class)->findAll();
            $sortIndex = array_rand($categories);

            $movie = new Movie();
            $movie->setTitle("Title od movie {$i}");
            $movie->setDescription("Description of movie {$i}");
            $movie->setReleaseDate(date_modify(new \DateTime(), "-$i days"));
            $movie->setCategory($categories[$sortIndex]);
            $manager->persist($movie);
        }

        $manager->flush();
    }
}

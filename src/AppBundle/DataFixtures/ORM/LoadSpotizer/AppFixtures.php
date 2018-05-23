<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 18/05/18
 * Time: 14:54
 */

namespace AppBundle\DataFixtures\ORM\LoadSpotizer;


use AppBundle\Entity\Artist;
use AppBundle\Entity\Playlist;
use AppBundle\Entity\Track;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $playlist = new Playlist();
        $playlist2 = new Playlist();

        $playlist->setName("Playlist une");
        $playlist2->setName("Playlist deux");


        for ($i = 0; $i < 20; $i++) {

            $artist= new Artist();


            $artist->setName('artist '.$i);
            $artist->setGenre('genre '.$i);
            $artist->setPicture('url '.$i);
            $artist->setType('type '.$i);

            $track= new Track();
            $track->setTitle('track '.$i);
            $track->setArtist($artist);
            $track->setDuration($i*5);



            if($i % 2 == 1){
                $playlist2->addTrack($track);

            }
            else{
                $playlist->addTrack($track);
            }

            $manager->persist($track);
            $manager->persist($playlist2);
            $manager->persist($playlist);
            $manager->persist($artist);
        }





        $manager->flush();
    }
}
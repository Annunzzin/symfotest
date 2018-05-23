<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 18/05/18
 * Time: 10:36
 */

namespace AppBundle\InMemory;

use AppBundle\Repository\Interfaces\ArtistRepoInterface;

class ArtistRepository implements ArtistRepoInterface
{

    public function find($id)
    {
        $artists = $this->findAll();
        $key = array_search($id,array_column($artists,'id'));

        if($key === false){
            return $this->redirectToRoute('app_artists');
        }

        return $key;
    }

    public function findAll()
    {
        return array(
            array(
                'id'=> 1,
                'name'=> 'foo fighters',
                'type' => 'band',
                'picture' => 'http://www.google.fr',
                'genre' => 'rock'

            ),
            array(
                'id'=> 2,
                'name'=> 'Une bande random',
                'type' => 'band',
                'picture' => 'https://fridg-front.s3.amazonaws.com/media/products/banane_DAC0XAQ.jpg',
                'genre' => 'rock'

            )
        );
    }
}
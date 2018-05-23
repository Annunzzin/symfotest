<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 18/05/18
 * Time: 10:28
 */

namespace AppBundle\InMemory;


use AppBundle\Repository\Interfaces\TrackRepoInterface;

class TrackRepository implements TrackRepoInterface
{

    public function find($id)
    {
        $tracks = $this->findAll();
        $key = array_search($id,array_column($tracks,'id'));

        if($key === false){
            return $this->redirectToRoute('app_tracks');
        }

        return $key;
    }

    public function findAll()
    {
        return array(
            array(
                'id'=> 1,
                'title'=> 'Everlong',
                'artist' => 1
            ),
            array(
                'id'=> 2,
                'title'=> 'song',
                'artist' => 2

            )
        );

    }
}
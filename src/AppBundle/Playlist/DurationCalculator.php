<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 21/05/18
 * Time: 10:15
 */

namespace AppBundle\Playlist;


use AppBundle\Entity\Playlist;

class DurationCalculator
{



    public function calculate(Playlist $playlist){



        $totalDuration = 0;

        $tracks = $playlist->getTracks();

        foreach ($tracks as $track){
            $totalDuration += $track->getDuration();
        }
        return $totalDuration;
    }

}
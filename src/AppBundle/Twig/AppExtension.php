<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 09:56
 */

namespace AppBundle\Twig;


use AppBundle\Playlist\DurationCalculator;
use AppBundle\Repository\PlaylistRepository;
use Twig_Extension;
use Twig_SimpleFilter;
use Twig_SimpleFunction;

class AppExtension extends Twig_Extension
{


    private $playlistRepository;

    public function __construct(PlaylistRepository $playlistRepository)
    {
        $this->playlistRepository = $playlistRepository;
    }

    public function getName(){
        return 'app_extension';
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('sec_to_min',array($this,'secToMin')),
        );
    }


    public function secToMin($value){

        return date('i:s',$value);

    }



    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('calculate',array($this->playlistRepository,'calculateDuration')),
        );
    }

}
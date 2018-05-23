<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 13:57
 */

namespace AppBundle\Notification;


use AppBundle\Entity\Artist;
use Symfony\Component\EventDispatcher\Event;

class ArtistNotifier extends Event
{

    private $artist;

    const ARTIST_CREATED = 'app.artist.created';

    public function __construct(Artist $artist)
    {
        $this->artist = $artist;
    }


}
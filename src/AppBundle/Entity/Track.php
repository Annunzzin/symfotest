<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="track")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrackRepository")
 */
class Track
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


    /**
     * @var int
     * @ORM\Column(name="duration",type="integer")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="Artist",inversedBy="tracks")
     */
    private $artist;


    /**
     * @ORM\ManyToMany(targetEntity="Playlist",mappedBy="tracks")
     */
    private $playlists;


    public function __construct()
    {
        $this->playlists = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Track
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set artist.
     *
     * @param \AppBundle\Entity\Artist|null $artist
     *
     * @return Track
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist.
     *
     * @return \AppBundle\Entity\Artist|null
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set duration.
     *
     * @param int $duration
     *
     * @return Track
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add playlist.
     *
     * @param \AppBundle\Entity\Playlist $playlist
     *
     * @return Track
     */
    public function addPlaylist(\AppBundle\Entity\Playlist $playlist)
    {
        $this->playlists[] = $playlist;

        return $this;
    }

    /**
     * Remove playlist.
     *
     * @param \AppBundle\Entity\Playlist $playlist
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePlaylist(\AppBundle\Entity\Playlist $playlist)
    {
        return $this->playlists->removeElement($playlist);
    }

    /**
     * Get playlists.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }
}

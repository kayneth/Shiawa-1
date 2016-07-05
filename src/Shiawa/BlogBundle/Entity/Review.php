<?php

namespace Shiawa\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="shiawa_review")
 * @ORM\Entity(repositoryClass="Shiawa\BlogBundle\Repository\ReviewRepository")
 */
class Review
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
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="anime_title", type="string", length=255)
     */
    private $animeTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="studio", type="string", length=255)
     */
    private $studio;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="graphisms", type="text")
     */
    private $graphisms;

    /**
     * @var string
     *
     * @ORM\Column(name="licenced_at", type="string", length=255)
     */
    private $licencedAt;

    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;

    /**
     * @var int
     *
     * @ORM\Column(name="viewed", type="bigint")
     */
    private $viewed = 0;

    public function __construct()
    {
        $this->categories   = new ArrayCollection();
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
     * @return Review
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
     * Set animeTitle
     *
     * @param string $animeTitle
     *
     * @return Review
     */
    public function setAnimeTitle($animeTitle)
    {
        $this->animeTitle = $animeTitle;

        return $this;
    }

    /**
     * Get animeTitle
     *
     * @return string
     */
    public function getAnimeTitle()
    {
        return $this->animeTitle;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     *
     * @return Review
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set graphisms
     *
     * @param string $graphisms
     *
     * @return Review
     */
    public function setGraphisms($graphisms)
    {
        $this->graphisms = $graphisms;

        return $this;
    }

    /**
     * Get graphisms
     *
     * @return string
     */
    public function getGraphisms()
    {
        return $this->graphisms;
    }

    /**
     * Set licencedAt
     *
     * @param string $licencedAt
     *
     * @return Review
     */
    public function setLicencedAt($licencedAt)
    {
        $this->licencedAt = $licencedAt;

        return $this;
    }

    /**
     * Get licencedAt
     *
     * @return string
     */
    public function getLicencedAt()
    {
        return $this->licencedAt;
    }

    /**
     * Set studio
     *
     * @param string $studio
     *
     * @return Review
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;

        return $this;
    }

    /**
     * Get studio
     *
     * @return string
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Review
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set viewed
     *
     * @param integer $viewed
     *
     * @return Review
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * Get viewed
     *
     * @return integer
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Review
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }
}

<?php

namespace Acme\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table("genre")
 * @ORM\Entity(repositoryClass="Acme\FilmsBundle\Entity\GenreRepository")
 */
class Genre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="genres")
     **/
    private $films;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->films = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add films
     *
     * @param \Acme\FilmsBundle\Entity\Film $films
     * @return Genre
     */
    public function addFilm(\Acme\FilmsBundle\Entity\Film $films)
    {
        $this->films[] = $films;
    
        return $this;
    }

    /**
     * Remove films
     *
     * @param \Acme\FilmsBundle\Entity\Film $films
     */
    public function removeFilm(\Acme\FilmsBundle\Entity\Film $films)
    {
        $this->films->removeElement($films);
    }

    /**
     * Get films
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilms()
    {
        return $this->films;
    }

    public function __toString()
    {
        return $this->name;
    }
}
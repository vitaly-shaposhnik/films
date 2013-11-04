<?php

namespace Acme\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\FilmsBundle\Entity\FilmRepository")
 */
class Film
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
     * @ORM\ManyToMany(targetEntity="Actor", inversedBy="films")
     * @ORM\JoinTable(name="Film_Actor")
     **/
    private $actors;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="films")
     * @ORM\JoinTable(name="Film_Category")
     **/
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="films")
     * @ORM\JoinTable(name="Film_Genre")
     **/
    private $genres;

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
     * @return Film
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
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add actors
     *
     * @param \Acme\FilmsBundle\Entity\Actor $actors
     * @return Film
     */
    public function addActor(\Acme\FilmsBundle\Entity\Actor $actors)
    {
        $this->actors[] = $actors;
    
        return $this;
    }

    /**
     * Remove actors
     *
     * @param \Acme\FilmsBundle\Entity\Actor $actors
     */
    public function removeActor(\Acme\FilmsBundle\Entity\Actor $actors)
    {
        $this->actors->removeElement($actors);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add categories
     *
     * @param \Acme\FilmsBundle\Entity\Category $categories
     * @return Film
     */
    public function addCategorie(\Acme\FilmsBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    
        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Acme\FilmsBundle\Entity\Category $categories
     */
    public function removeCategorie(\Acme\FilmsBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add genres
     *
     * @param \Acme\FilmsBundle\Entity\Genre $genres
     * @return Film
     */
    public function addGenre(\Acme\FilmsBundle\Entity\Genre $genres)
    {
        $this->genres[] = $genres;
    
        return $this;
    }

    /**
     * Remove genres
     *
     * @param \Acme\FilmsBundle\Entity\Genre $genres
     */
    public function removeGenre(\Acme\FilmsBundle\Entity\Genre $genres)
    {
        $this->genres->removeElement($genres);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGenres()
    {
        return $this->genres;
    }

    public function __toString()
    {
        return $this->name;
    }
}
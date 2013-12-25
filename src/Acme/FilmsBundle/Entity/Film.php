<?php

namespace Acme\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bundle\FrameworkBundle\Controller;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Film
 *
 * @ORM\Table("film")
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
     * @Assert\Length(
     *      min = "1",
     *      max = "150",
     *      minMessage = "Минимум {{ limit }} символов",
     *      maxMessage = "Нельзя ввести название длиннее {{ limit }} символов",
     *      groups={"film_form"}
     * )
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Actor", cascade={"persist"}, inversedBy="films")
     * @ORM\JoinTable(name="film_actor")
     **/
    private $actors;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="films")
     * @ORM\JoinTable(name="film_category")
     **/
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="films")
     * @ORM\JoinTable(name="film_genre")
     **/
    private $genres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

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


    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    /**
     * @param string $path
     * @return string
     */
    public function setPath($path)
    {
        return $path;
    }

    /**
     * @return string|null
     */
    public function getPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images/film-preview';
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path =  $this->getUploadRootDir() . '/' . $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * @return \Acme\FilmsBundle\Entity\datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \Acme\FilmsBundle\Entity\date
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
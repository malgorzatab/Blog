<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Users;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="title", type="text")
     */


    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_posted", type="date")
     */
    private $dataPosted;

    /**
     * @var string
     * @ORM\Column(name="image",type="string", length=20)
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(name="tags",type="text")
     */
    private $tags;



    /**
     * Many Posts have One User.
     *
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="posts")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $userId;


    /**
     * Post constructor.
     **/

    public function __construct()
    {

       // $this->id = $id;@param int $id
    }


    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }




    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @return Post
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
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dataPosted
     *
     * @param \DateTime $dataPosted
     *
     * @return Post
     */
    public function setDataPosted($dataPosted)
    {
        $this->dataPosted = $dataPosted;

        return $this;
    }

    /**
     * Get dataPosted
     *
     * @return \DateTime
     */
    public function getDataPosted()
    {
        return $this->dataPosted;
    }



}


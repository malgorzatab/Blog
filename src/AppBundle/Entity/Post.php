<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Users;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @Assert\NotBlank(message="Please upload a valid Image")
     * @Assert\File( mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"})
     * @Assert\Image()
     * @ORM\Column(name="image",type="string", length=255)

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
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;

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




   /* public function getWebPath() {
        return null  === $this->image ? null : $this->getUploadDir().'/' .$this->image;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../web/uploads/images'.$this->getUploadDir();
    }

    protected function getUploadDir() {
        // the absolute directory path where uploaded documents should be saved
        return 'uploads/images';
    }


    public function uploadImage() {

        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->image=$this->file->getClientOriginalName();
        $this->file=null;

    }*/


}


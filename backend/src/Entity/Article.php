<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto404@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Table(name: "articles", options: ["engine" => "InnoDB"])]
#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\Index(columns: ["user_id"])]
#[ORM\Index(columns: ["image"])]
#[ORM\Index(columns: ["title"])]
#[ORM\Index(columns: ["status"])]
#[ORM\Index(columns: ["created_at"])]
#[ORM\Index(columns: ["updated_at"])]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint', options: ["unsigned" => true])]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    private User $user;

    #[ORM\Column(length: 191, nullable: true)]
    private string $image;

    #[ORM\Column(length: 191)]
    private string $slug;

    #[ORM\Column(length: 191)]
    private string $title;

    #[ORM\Column(type: 'text', length: 65535, nullable: true)]
    private string $description;

    #[ORM\Column(type: 'text')]
    private string $content;

    #[ORM\Column(type: 'smallint', options: ["unsigned" => true, "default"=> 0])]
    private int $status = 0;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: true)]
    private DateTime $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private DateTime $updatedAt;

    #[ORM\JoinTable(name: 'articles_references', options: ["engine" => "InnoDB"])]
    #[ORM\JoinColumn(name: 'article_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'reference_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Reference::class)]
    private Collection $references;

    public function __construct() {
        $this->$references = new ArrayCollection();
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    /**
     * @return Collection
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param Collection $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}
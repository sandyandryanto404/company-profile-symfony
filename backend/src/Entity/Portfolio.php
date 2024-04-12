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

use App\Repository\PortfolioRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Table(name: "portfolios", options: ["engine" => "InnoDB"])]
#[ORM\Entity(repositoryClass: PortfolioRepository::class)]
#[ORM\Index(columns: ["customer_id"])]
#[ORM\Index(columns: ["reference_id"])]
#[ORM\Index(columns: ["title"])]
#[ORM\Index(columns: ["project_date"])]
#[ORM\Index(columns: ["sort"])]
#[ORM\Index(columns: ["status"])]
#[ORM\Index(columns: ["created_at"])]
#[ORM\Index(columns: ["updated_at"])]
class Portfolio
{

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint', options: ["unsigned" => true])]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    private Customer $customer;

    #[ORM\ManyToOne(targetEntity: Reference::class)]
    #[ORM\JoinColumn(name: 'reference_id', referencedColumnName: 'id')]
    private Reference $reference;

    #[ORM\Column(length: 191)]
    private string $title;

    #[ORM\Column(type: 'text', length: 65535)]
    private string $description;

    #[ORM\Column(name: 'project_date', type: 'date', nullable: true)]
    private DateTime $projectDate;

    #[ORM\Column(name: 'project_url', type: 'text', length: 65535, nullable: true)]
    private string $projectUrl;

    #[ORM\Column(type: 'integer', options: ["unsigned" => true, "default"=> 0])]
    private int $sort = 0;

    #[ORM\Column(type: 'smallint', options: ["unsigned" => true, "default"=> 0])]
    private int $status = 0;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: true)]
    private DateTime $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private DateTime $updatedAt;

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
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param Reference $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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
     * @return DateTime
     */
    public function getProjectDate()
    {
        return $this->projectDate;
    }

    /**
     * @param DateTime $projectDate
     */
    public function setProjectDate($projectDate)
    {
        $this->projectDate = $projectDate;
    }

    /**
     * @return string
     */
    public function getProjectUrl()
    {
        return $this->projectUrl;
    }

    /**
     * @param string $projectUrl
     */
    public function setProjectUrl($projectUrl)
    {
        $this->projectUrl = $projectUrl;
    }

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
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
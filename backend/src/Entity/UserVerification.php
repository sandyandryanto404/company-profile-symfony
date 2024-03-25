<?php

namespace App\Entity;

use App\Repository\UserVerificationRepository;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "users_verifications", options: ["engine" => "InnoDB"])]
#[ORM\Entity(repositoryClass: UserVerificationRepository::class)]
#[ORM\Index(columns: ["user_id"])]
#[ORM\Index(columns: ["token"])]
#[ORM\Index(columns: ["status"])]
#[ORM\Index(columns: ["expired_at"])]
class UserVerification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint', options: ["unsigned" => true])]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    private User $user;

    #[ORM\Column(length: 255)]
    private string $token;

    #[ORM\Column(type: 'smallint', options: ["unsigned" => true, "default"=> 0])]
    private int $status = 0;

    #[ORM\Column(name: 'expired_at', type: 'datetime', nullable: true)]
    private DateTime $expiredAt;

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
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
    public function getExpiredAt()
    {
        return $this->expiredAt;
    }

    /**
     * @param DateTime $expiredAt
     */
    public function setExpiredAt($expiredAt)
    {
        $this->expiredAt = $expiredAt;
    }


}

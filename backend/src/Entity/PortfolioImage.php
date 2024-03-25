<?php

namespace App\Entity;

use App\Repository\PortfolioImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioImageRepository::class)]
class PortfolioImage
{

}

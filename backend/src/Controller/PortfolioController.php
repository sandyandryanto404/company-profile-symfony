<?php

namespace App\Controller;

use Faker\Factory;
use App\Repository\PortfolioRepository;
use App\Repository\PortfolioImageRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PortfolioController extends BaseController
{
    private $portfolio;
    private $image;

    public function __construct(PortfolioRepository $_portfolio, PortfolioImageRepository $_image)
    {
        $this->portfolio = $_portfolio;
        $this->image = $_image;
    }

    #[Route('api/portfolio/list', methods: ["GET"], name: 'portfolio_list')]
    public function list() : JsonResponse 
    {
        $portfolios = $this->portfolio->findByRandom(1,  100);
        $response = array("portfolios"=> $this->responseData($portfolios));
        return $this->respondWithSuccess("ok", [], $response);
    }
 
    #[Route('api/portfolio/detail/{id}', methods: ["GET"], name: 'portfolio_detail')]
    public function detail($id) : JsonResponse 
    {
        $portfolio = $this->portfolio->findOneBy(['id' => $id]);

        if(is_null($portfolio)){
            return $this->respondValidationError("Data not found with id ".$id);
        } 

        $image = $this->image->findBy(["portfolio"=> $id], ["id"=> "DESC"]);
        
        $response = array(
            "portfolio"=> $this->responseData($portfolio),
            "images"=> $this->responseData($image)
        );
        
        return $this->respondWithSuccess("ok", [], $response);
    }


}
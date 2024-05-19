<?php

namespace App\Controller;

use Faker\Factory;
use App\Entity\Contact;
use App\Repository\ArticleRepository;
use App\Repository\ContactRepository;
use App\Repository\CustomerRepository;
use App\Repository\FaqRepository;
use App\Repository\PortfolioRepository;
use App\Repository\ServiceRepository;
use App\Repository\SliderRepository;
use App\Repository\TeamRepository;
use App\Repository\TestimonialRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PageController extends BaseController
{

    private $article;
    private $contact;
    private $customer;
    private $faq;
    private $portfolio;
    private $service;
    private $slider;
    private $team;
    private $testimonial;

    public function __construct(
        ArticleRepository $_article,
        ContactRepository $_contact,
        CustomerRepository $_customer,
        FaqRepository $_faq,
        PortfolioRepository $_portfolio,
        ServiceRepository $_service,
        SliderRepository $_slider,
        TeamRepository $_team,
        TestimonialRepository $_testimonial
    ){
        $this->article = $_article;
        $this->contact = $_contact;
        $this->customer = $_customer;
        $this->faq = $_faq;
        $this->portfolio = $_portfolio;
        $this->service = $_service;
        $this->slider = $_slider;
        $this->team = $_team;
        $this->testimonial = $_testimonial;
        $this->slider = $_slider;
    }



    #[Route('api/page/ping', methods: ["GET"], name: 'page_ping')]
    public function ping() : JsonResponse 
    {
        return $this->respondWithSuccess("ok");
    }

    #[Route('api/page/home', methods: ["GET"], name: 'page_home')]
    public function home() : JsonResponse 
    {
        $faker = Factory::create();
        $services = $this->service->findByRandom(1, 4);
        $articles = $this->article->findByRandomResult(1, 3);
        $testimonials = $this->testimonial->findByRandom(1, 1);
        $sliders = $this->slider->getAll();
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "sliders"=> $this->responseData($sliders),
            "services"=> $this->responseData($services),
            "articles"=> $this->responseData($articles),
            "testimonials"=> $this->responseData($testimonials)
        );
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/about', methods: ["GET"], name: 'page_about')]
    public function about() : JsonResponse 
    {
        $teams = $this->team->findByRandom(1, 100);
        $faker = Factory::create();
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->sentence(20)
            ),
            "section1"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "section2"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "teams"=> $this->responseData($teams)
        );
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/service', methods: ["GET"], name: 'page_service')]
    public function service() : JsonResponse 
    {
        $faker = Factory::create();
        $services = $this->service->findByRandom(1, 100);
        $customers = $this->customer->findByRandomResult(1, 100);
        $testimonials = $this->testimonial->findByRandom(1, 100);
        $response = array(
            "header"=> array(
                "title"=> $faker->sentence(5),
                "description"=> $faker->text()
            ),
            "services"=> $this->responseData($services),
            "customers"=> $this->responseData($customers),
            "testimonials"=> $this->responseData($testimonials)
        );
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/faq', methods: ["GET"], name: 'page_faq')]
    public function faq() : JsonResponse 
    {
        $faqs1 = $this->faq->findAllBySort("<=", 5);
        $faqs2 = $this->faq->findAllBySort(">", 5);
        $response = array(
            "faqs1"=> $this->responseData($faqs1),
            "faqs2"=> $this->responseData($faqs2)
        );
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/contact', methods: ["GET"], name: 'page_contact')]
    public function contact() : JsonResponse 
    {
        $services = $this->service->findByRandom(1, 4);
        $response = array("services"=> $this->responseData($services));
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/message', methods: ["POST"], name: 'page_message')]
    public function message(Request $request) : JsonResponse 
    {
        $request = $this->transformJsonBody($request);
        $name = $request->get("name");
        $email = $request->get("email");
        $subject = $request->get("subject");
        $message = $request->get("message");
        $status = 0;

        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setSubject($subject);
        $contact->setMessage($message);
        $contact->setStatus($status);
        $this->contact->saveOrUpdate($contact);

        $response = $this->responseData($contact);
        return $this->respondWithSuccess("ok", [], $response);
    }

    #[Route('api/page/subscribe', methods: ["POST"], name: 'page_subscribe')]
    public function subscribe(Request $request) : JsonResponse 
    {
        return $this->respondWithSuccess("ok");
    }

}
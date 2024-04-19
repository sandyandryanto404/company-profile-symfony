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

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Faker\Factory;
use App\Helper\MyHelper;
use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\Contact;
use App\Entity\Customer;
use App\Entity\Faq;
use App\Entity\Portfolio;
use App\Entity\PortfolioImage;
use App\Entity\Reference;
use App\Entity\Service;
use App\Entity\Slider;
use App\Entity\Team;
use App\Entity\Testimonial;
use App\Entity\User;
use DateTime;

class AppFixtures extends Fixture {

    private PasswordHasherFactoryInterface $passwordHasherFactory;
    private EntityManagerInterface $em;

    public function __construct(PasswordHasherFactoryInterface $hasherFactory, EntityManagerInterface $em) {
        $this->passwordHasherFactory = $hasherFactory;
        $this->em = $em;
    }

    public function load(ObjectManager $manager): void 
    {
        $this->CreateUser($manager);
        $this->CreateReference($manager);
        $this->CreateContact($manager);
        $this->CreateCustomer($manager);
        $this->CreateFaq($manager);
        $this->CreateService($manager);
        $this->CreateSlider($manager);
        $this->CreateTeam($manager);
        $this->CreateTestimonial($manager);
        $this->CreatePortfolio($manager);
        $this->CreateArticle($manager);
    }

    private function CreateUser(ObjectManager $manager) : void 
    {
        for($i = 1; $i <= 10; $i++)
        {
            $faker = Factory::create();
            $plainPassword = "p4ssw0rd!";
            $gender = (int) rand(1, 2);
            $first_name = $gender == 1 ? $faker->firstNameMale : $faker->firstNameFemale;

            $passwordHasher = $this->passwordHasherFactory->getPasswordHasher(User::class);
            $hash = $passwordHasher->hash($plainPassword);

            $user = new User();
            $user->setFirstName($first_name);
            $user->setLastName($faker->lastName);
            $user->setGender($gender == 1 ? "M" : "F");
            $user->setCountry($faker->country);
            $user->setAddress($faker->streetAddress);
            $user->setAboutMe($faker->text);
            $user->setEmail($faker->safeEmail);
            $user->setPassword($hash);
            $user->setPhone($faker->phoneNumber);
            $user->setStatus(1);
            $user->setConfirmToken(md5($faker->uuid));
            $user->setRoles(["ROLE_USER"]);
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function CreateReference(ObjectManager $manager) : void 
    {
        $articles = [
            "Health and wellness",
            "Technology and gadgets",
            "Business and finance",
            "Travel and tourism",
            "Lifestyle and fashion"
        ];

        $tags = [
            "Mental Health",
            "Fitness and Exercise",
            "Alternative Medicine",
            "Artificial Intelligence",
            "Network Security",
            "Cloud Computing",
            "Entrepreneurship",
            "Personal Finance",
            "Marketing and Branding",
            "Travel Tips and Tricks",
            "Cultural Experiences",
            "Destination Guides",
            "Beauty and Fashion Trends",
            "Celebrity News and Gossip",
            "Parenting and Family Life",
        ];

        $portfolios = [
            "3D Modeling",
            "Web Application",
            "Mobile Application",
            "Illustrator Design",
            "UX Design"
        ];

        foreach($articles as $article)
        {
            $faker = Factory::create();
            $aa = new Reference();
            $aa->setSlug(MyHelper::strToSlug($article));
            $aa->setName($article);
            $aa->setType(1);
            $aa->setStatus(1);
            $aa->setDescription($faker->text);
            $manager->persist($aa);
        }

        foreach($tags as $tag)
        {
            $faker = Factory::create();
            $tt = new Reference();
            $tt->setSlug(MyHelper::strToSlug($tag));
            $tt->setName($tag);
            $tt->setType(2);
            $tt->setStatus(1);
            $aa->setDescription($faker->text);
            $manager->persist($aa);
        }

        foreach($portfolios as $portfolio)
        {
            $faker = Factory::create();
            $pp = new Reference();
            $pp->setSlug(MyHelper::strToSlug($portfolio));
            $pp->setName($portfolio);
            $pp->setType(3);
            $pp->setStatus(1);
            $pp->setDescription($faker->text);
            $manager->persist($pp);
        }

        $manager->flush();
    }

    private function CreateContact(ObjectManager $manager) : void 
    {
        for($i = 1; $i <= 10; $i++)
        {
            $faker = Factory::create();
            $cc = new Contact();
            $cc->setName($faker->name);
            $cc->setEmail($faker->email);
            $cc->setSubject($faker->sentence(5));
            $cc->setMessage($faker->text);
            $cc->setStatus(0);
            $manager->persist($cc);
        }

        $manager->flush();
    }

    private function CreateCustomer(ObjectManager $manager) : void 
    {
        for($i = 1; $i <= 10; $i++)
        {
            $faker = Factory::create();
            $cs = new Customer();
            $cs->setImage("customer".$i.".jpg");
            $cs->setName($faker->company);
            $cs->setEmail($faker->email);
            $cs->setPhone($faker->phoneNumber);
            $cs->setAddress($faker->address);
            $cs->setSort($i);
            $cs->setStatus(1);
            $manager->persist($cs);
        }

        $manager->flush();
    }

    private function CreateFaq(ObjectManager $manager) : void 
    {
        for($i = 1; $i <= 10; $i++)
        {
            $faker = Factory::create();
            $faq = new Faq();
            $faq->setQuestion($faker->sentence(5));
            $faq->setAnswer($faker->text);
            $faq->setStatus(1);
            $faq->setSort($i);
            $manager->persist($faq);
        }
        $manager->flush();
    }

    private function CreateService(ObjectManager $manager) : void 
    {
        $icons = [
            "fas fa-archive",
            "fas fa-atom",
            "fas fa-award",
            "fas fa-balance-scale",
            "fas fa-blender",
            "fas fa-book-reader",
            "fas fa-box-open",
            "fas fa-cash-register",
            "fas fa-cloud-download-alt",
        ];

        foreach($icons as $index => $icon)
        {
            $sort = $index+1;
            $faker = Factory::create();
            $ss = new Service();
            $ss->setIcon($icon);
            $ss->setTitle($faker->sentence(4));
            $ss->setDescription($faker->text);
            $ss->setStatus(1);
            $ss->setSort($sort);
            $manager->persist($ss);
        }

        $manager->flush();
    }

    private function CreateSlider(ObjectManager $manager) : void 
    {
        for($i = 1; $i <=5; $i++)
        {
            $faker = Factory::create();
            $sl = new Slider();
            $sl->setImage("slider".$i.".jpg");
            $sl->setTitle($faker->sentence(5));
            $sl->setDescription($faker->text);
            $sl->setStatus(1);
            $sl->setSort($i);
            $manager->persist($sl);
        }

        $manager->flush();
    }   
    
    private function CreateTeam(ObjectManager $manager) : void 
    {
        for($i = 1; $i <=10; $i++)
        {
            $faker = Factory::create();
            $team = new Team();
            $team->setImage("team".$i.".jpg");
            $team->setName($faker->name);
            $team->setEmail($faker->email);
            $team->setPhone($faker->phoneNumber);
            $team->setPositionName($this->getJobTitle());
            $team->setSort($i);
            $team->setTwitter(MyHelper::strToSlug($faker->name));
            $team->setFacebook(MyHelper::strToSlug($faker->name));
            $team->setInstagram(MyHelper::strToSlug($faker->name));
            $team->setLinkedIn(MyHelper::strToSlug($faker->name));
            $team->setAddress($faker->address);
            $team->setStatus(1);
            $manager->persist($team);
        }
        $manager->flush();
    }

    private function CreateTestimonial(ObjectManager $manager) : void 
    {
        $customers = $this->em->getRepository(Customer::class)->findAll();
        foreach($customers as $index => $customer)
        {
            $sort = $index + 1;
            $faker = Factory::create();
            $ts = new Testimonial();
            $ts->setCustomer($customer);
            $ts->setImage("testimonial".$sort.".jpg");
            $ts->setName($faker->name);
            $ts->setPositionName($this->getJobTitle());
            $ts->setQuote($faker->text);
            $ts->setSort($sort);
            $ts->setStatus(1);
            $manager->persist($ts);
        }
        $manager->flush();
    }

    private function CreatePortfolio(ObjectManager $manager) : void 
    {
        for($i = 1; $i <= 9; $i++)
        {
            $faker = Factory::create();
            $category = $this->em->getRepository(Reference::class)->findByRandom(3);
            $customer = $this->em->getRepository(Customer::class)->findByRandom();
            $projectDate = $faker->dateTimeBetween('-20 years')->format('Y-m-d');
            $projectDate = new DateTime($projectDate);
            
            $pp = new Portfolio();
            $pp->setCustomer($customer);
            $pp->setReference($category);
            $pp->setTitle($faker->catchPhrase);
            $pp->setDescription($faker->text);
            $pp->setProjectDate($projectDate);
            $pp->setProjectUrl($faker->text);
            $pp->setStatus(1);
            $pp->setSort($i);
            $manager->persist($pp);

            for($j = 1; $j <= 4; $j++)
            {
                $pg = new PortfolioImage();
                $pg->setPortfolio($pp);
                $pg->setImage("portfolio".$j.".jpg");
                $pg->setStatus($j == 1 ? 1 : 0);
                $manager->persist($pg);
            }
        }

        $manager->flush();
    }

    private function CreateArticle(ObjectManager $manager) : void 
    {
        $users = $this->em->getRepository(User::class)->findAll();
        foreach($users as $index => $user)
        {
            $number = $index + 1;
            $faker = Factory::create();
            $title = $faker->sentence(10);
            $slug = MyHelper::strToSlug($title);
            $references = $this->em->getRepository(Reference::class)->findAllByRandomArticle(10);

            $article = new Article();
            $article->setUser($user);
            $article->setReferences($references);
            $article->setImage("article".$number.".jpg");
            $article->setTitle($title);
            $article->setSlug($slug);
            $article->setDescription($faker->sentence(20));
            $article->setContent($faker->text);
            $article->setStatus(1);
            $manager->persist($article);

            $user_id = $user->getId();
            $userAnothers = $this->em->getRepository(User::class)->findByAnother($user_id, 3);

            foreach($userAnothers as $un)
            {
                $cm = new ArticleComment();
                $cm->setArticle($article);
                $cm->setUser($un);
                $cm->setComment($faker->text);
                $manager->persist($cm);
            }

        }

        $manager->flush();
    }

    private function getJobTitle(){
        $jobs = MyHelper::jobs();
        return $jobs[rand(0, count($jobs) - 1)];
    }
    
}
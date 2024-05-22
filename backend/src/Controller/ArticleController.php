<?php

namespace App\Controller;

use Faker\Factory;
use App\Repository\ArticleRepository;
use App\Repository\ArticleCommentRepository;
use App\Entity\ArticleComment;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends BaseController
{
    private $article;
    private $comment;

    public function __construct(ArticleRepository $_article, ArticleCommentRepository $_comment)
    {
        $this->article = $_article;
        $this->comment = $_comment;
    }

    #[Route('api/article/list', methods: ["GET"], name: 'article_list')]
    public function list(Request $request)
    {
        $page = $request->get("page", 1);
        $limit = 3 * $page;
        $newArticleSource = $this->article->getNew();
        $newArticle = $this->article->findBySlug($newArticleSource["slug"]);
        $newArticles  = $this->article->getNews($newArticle->getId());
        $stories = $this->article->getStories($limit);
        $continueArticle = $this->article->checkContinue($limit);

        $response = array(
            "continue"=> $continueArticle,
            "new_article"=> $this->responseData($newArticle),
            "new_articles"=> $this->responseData($newArticles),
            "stories"=> $this->responseData($stories),
            "page"=> $page,
        );

        return $this->respondWithSuccess("ok", [], ["data"=> $response]);
    }

    #[Route('api/article/detail/{slug}', methods: ["GET"], name: 'article_detail')]
    public function detail($slug)
    {
        $article = $this->article->findBySlug($slug);

        if(is_null($article)){
            return $this->respondValidationError("Data not found with slug ".$slug);
        } 

        $article = $this->responseData($article);
        return $this->respondWithSuccess("ok", [], ["article"=> $article]);
    }

    #[Route('api/article/comment/list/{id}', methods: ["GET"], name: 'article_comment_list')]
    public function listComment($id)
    {
        $comments = $this->comment->buildComment($id);
        $comments = $this->responseData($comments);
        return $this->respondWithSuccess("ok", [], ["comments"=> $comments]);
    }

    #[Route('api/article/comment/create/{id}', methods: ["POST"], name: 'article_comment_create')]
    public function createComment($id, Request $request)
    {
        $request = $this->transformJsonBody($request);
        $article = $this->article->findById($id);
        $user = $this->getUser();
        $comment = new ArticleComment();
        $comment->setArticle($article);
        $comment->setUser($user);
        $comment->setComment($request->get("comment"));
        $comment->setStatus(1);
        $this->comment->saveOrUpdate($comment);
        $response = $this->responseData($comment);
        return $this->respondWithSuccess("ok", [], ["data"=> $response]);
    }

}
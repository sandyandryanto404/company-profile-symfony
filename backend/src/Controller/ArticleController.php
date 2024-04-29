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

    }

    #[Route('api/article/detail/{slug}', methods: ["GET"], name: 'article_detail')]
    public function detail($slug)
    {

    }

    #[Route('api/article/comment/list/{id}', methods: ["GET"], name: 'article_comment_list')]
    public function listComment($id)
    {
        $comments = $this->comment->buildComment($id);
        $comments = $this->responseData($comments);
        return $this->respondWithSuccess("ok", [], ["comments"=> $comments]);
    }

    #[Route('api/article/comment/create/{id}', methods: ["GET"], name: 'article_comment_create')]
    public function createComment($id, Request $request)
    {
        $user = $this->getUser();
        $comment = new ArticleComment();
        $comment->setArticle($id);
        $comment->setUser($user);
        $comment->setComment($request->get("comment"));
        $comment->setStatus(1);
        $this->comment->saveOrUpdate($comment);
        $response = $this->responseData($comment);
        return $this->respondWithSuccess("ok", [], ["data"=> $response]);
    }

}
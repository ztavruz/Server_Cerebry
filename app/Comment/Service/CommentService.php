<?php
declare(strict_types=1);

namespace App\Comment\Service;

use App\Comment\Entity\Comment;
use App\Comment\Repository\CommentRepository;
use App\General\Entity\One_to_many;


class CommentService{

    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }


    // tested +
    //создать коментарий
    public function create(Comment $newComment)
    {   
        $this->repository->create($newComment);
    }

    // tested +
    //получить коментарий зб БД по id
    public function getOne(Comment $thisComment): Audio
    {   
        $thisComment = $this->repository->getOne($thisComment);
        return $thisComment;
    }

    // tested +
    //изменить коментарий
    public function change(Comment $changeableComment)
    {   
        $changeableComment = $this->repository->change($changeableComment);
    }

    public function getAllComment(Comment $allComment){
        $allComment = $this->repository->getAllComment($allComment);
        return $allComment;
    }
}
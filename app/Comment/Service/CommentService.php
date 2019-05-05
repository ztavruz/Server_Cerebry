<?php
declare(strict_types=1);

namespace App\Comment\Service;

use App\Comment\Repository\CommentRepository;
Use App\Comment\Entity\CommentDTO;

class CommentService{

    private $repository;

    public function __construct(CommentRepository $repository){

        $this->repository = $repository;

    }

    public function createNewComment(array $content){
    // -id
	// -user_id
	// -audiosession_id
	// -text
	// -time
    // -approved (bool)
        
        $newComment = new CommentDTO();
        $newComment->user_id = $content['user_id'];
        $newComment->audiosession_id =$content['audiosession_id'];
        $newComment->text = $content['text'];
        $newComment->time = $content['time'];

        $this->repository->saveComment($newComment);
        return $newComment;
    }
    public function defineComments(array $arrayData){

        $dataComment = new CommentDTO();
        $dataComment->audiosession_id = $arrayData['audiosession_id'];

        $this->repository->getComments($dataComment);
    }
}
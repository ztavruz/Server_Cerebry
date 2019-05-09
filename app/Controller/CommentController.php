<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Controller;
use App\Comment\Entity\Comment;
use App\General\Entity\One_to_many;
use Appp\Comment\Service\CommentService;

//создать комментарий
//получить комментарий из БД по id
//изменить комментарий 
//получить все комментарий относящиеся к аудиосессии
//получить автора комментария


class CommentController  extends Controller{
    // text
    // time
    // audiosession_id
    // user_id
    // approved

	private $service;

	public function __construct(CommentService $service)
	{
		$this->service = $service;
	}

	public function createComment()
	{
		$data_post = json_decode(file_get_contents('php://input'), true);

		$newComment = new Comment();
		$newComment->setText($data_post['text']);
		$newComment->setTime($data_post['time']);
		$newComment->setAudiosession_id($data_post['audiosession_id']);
		$newComment->setUser_id($data_post['user_id']);
		$newComment->setApproved($data_post['approved']);

		$newComment = $this->service->create($newComment);

		echo $this->json($newComment);
	}

	public function geOnetComment()
	{
			$data_post = json_decode(file_get_contents('php://input'), true);

			$thisComment = new Comment();
			$thisComment->setId($data_post['id']);
			$thisComment = $this->repository->getOne($thisComment);

			echo $this->json($thisComment);
	}

	public function changeComment()
	{
		$data_post = json_decode(file_get_contents('php://input'), true);

		$changeableComment = new Comment();
		$changeableComment->setText($data_post['text']);
		$changeableComment->setTime($data_post['time']);
		$changeableComment->setAudiosession_id($data_post['audiosession_id']);
		$changeableComment->setUser_id($data_post['user_id']);

		$changeableComment = $this->service->change($changeableComment);
	}

	//получить все аудио к аудиосессии 
	public function allComment_for_AudioSession()
	{
		$data_post = json_decode(file_get_contents('php://input'), true);

		$allComment = new Comment();
		$allComment->setAudiosession_id($data_post['audiosession_id']);
		$allComment = $this->service->getAllComment($allComment);

		echo $this->json($allComment);
  }


}
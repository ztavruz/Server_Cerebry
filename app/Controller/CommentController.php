<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Controller;
use Appp\Comment\Service\ServiceComment;

class CommentController  extends Controller{
  // -id
	// -user_id
	// -audiosession_id
	// -text
	// -time
	// -approved (bool)

	private $service;

	public function __construct(CommentService $service){
		$this->service = $service;
	}

	public function showAllCommentsForAudioSession(){
		// -user_id
		// -audiosession_id
		$arrayData = json_decode(file_get_contents('php://input'),true);
		$arrayAudiosession = $this->service->defineComments($arrayData);
		
		echo $this->json($arrayAudiosession);
	}

	Public function addComment()
	{
		$content = json_decode(file_get_contents('php://input'),true);
		$newComment = $this->service->createNewComment($content);
    }

}
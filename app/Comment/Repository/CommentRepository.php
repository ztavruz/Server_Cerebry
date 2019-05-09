<?php
declare(strict_types=1);

namespace App\Comment\Repository;

use RedBeanPHP\R;
use App\Comment\Entity\Comment;
use App\General\Entity\Helper;

class CommentRepository{

    public function create(Comment $newComment)
    {
        // text
        // time
        // audiosession_id
        // user_id
        // approved
        $bean = R::dispense("comment");
        $bean->text = $newComment->getText();
        $bean->time = $newComment->getTime();
        $bean->audiosession_id = $newComment->getAudiosession_id();
        $bean->user_id = $newComment->getUser_id();
        $bean->approved = $newComment->getApproved() ;
        R::store($bean);

    }

    //получить комментарий из БД по id
    public function getOne(Comment $thisComment)
    {
        $thisComment = $thisComment->getId();
        $helper = new Helper();

        $thisComment = R::getRow("SELECT * FROM comment WHERE id = ?", [$thisComment]);
        return $helper->convertToObjectAudioSession($thisComment);
        
    }
    
    public function change(Comment $changeableComment)
    {
        $changeableComment = $changeableComment->getId();

        $bean = R::load('comment', $changeableComment);
        $bean->text = $changeableComment->getText();
        $bean->time = $changeableComment->getTime();
        $bean->audiosession_id = $changeableComment->getDescription();
        $bean->user_id = $changeableComment->getCost();
        R::store($bean);
    }


    public function getAllComment(Comment $allComment): array
    {
        $audiosession_id = $allComment->getAudiosession_id();
        $allComment = R::getAll('SELECT * FROM comment WHERE audiosession_id = ?',[$audiosession_id]);
        $listComment = [];
        foreach($allComment as $comment){
            $listComment[] = $this->convertToObject($comment);
        }
        
        return $listComment;
    }
}
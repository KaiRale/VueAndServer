<?php
namespace Web\FrontController\Repository;

use Web\FrontController\Core\DB;
class TaskRepository
{
    private $db;
    public function __construct()
    {
        $this->db=DB::getDB();
    }

    public function addTask($taskData){
        //приводим строку к ассоциативному массиву
        $taskData=json_decode($taskData,true);
        $sql='INSERT INTO Task (title,description,isDel) VALUE (:title, :description, :isDel)';
        return $this->db->nonSelectQuery($sql,$taskData);
    }
}
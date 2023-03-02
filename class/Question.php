<?php 
class Question 
{
    public $id;
    public $title;
    public $explaination;
    public $answers = [];

    public function __construct(Array $data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->explaination = $data['explaination'];
    }

}
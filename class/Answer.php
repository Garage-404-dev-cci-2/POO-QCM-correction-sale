<?php
class Answer 
{
    public $id;
    public $content;
    public $isTrue;
    public $questionId;

    public function __construct(Array $data)
    {
        $this->id = $data['id'];
        $this->content = $data['content'];
        $this->isTrue = $data['is_true'];
        $this->questionId = $data['question_id'];
    }

}
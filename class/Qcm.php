<?php 
require_once('Question.php');
require_once('Answer.php');

class Qcm
{
    private $questions = [];

    private $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getQuestions()
    {
        $query = $this->db->query('SELECT * FROM questions');
        $allQuestionsFromDb = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allQuestionsFromDb as $data) {

            $question = new Question($data);
            $query = $this->db->query('SELECT * FROM answers WHERE question_id = '.$question->id.'');
            $allAnswersFromQuestionId = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($allAnswersFromQuestionId as $data) {
                $answer = new Answer($data);
                array_push($question->answers, $answer);
            }

            array_push($this->questions, $question);
        }
    }


    // fonction qui génère le HTML avec le contenu de nos objets Question et Answer
    public function generate()
    {
        foreach ($this->questions as $key => $question) {
            echo "
                <h3> {$question->title} </h3> 
            ";
            foreach ($question->answers as $key => $answer) {
              echo "
                <div>
                    <input type='radio' id='{$key}' name=' {$key}reponse' value='{$answer->content}'>
                    <label for='{$key}reponse'>{$answer->content}</label>
                </div>
              ";
           }
       }
    }

}
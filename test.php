<?php
require_once "./Question.php";
require_once "./QuestionsList.php";

class Test {
    private $filePath;

    public function __construct($path) {
        $this -> filePath = $path;
    }

    public function getAllQuestions() {
        $questionList = new QuestionsList([]);
        try {
            $questionList->parse('./questions.md');
            print_r($questionList -> all());
        } catch (Exception $e) {
            echo "Meassage: ".$e->getMessage();
        }
    }

    public function getQuestion($n) {
        $questionList = new QuestionsList([]);
        try {
            $questionList->parse('./questions.md');
            print_r($questionList -> getQuestion($n));
        } catch (Exception $e) {
            echo "Meassage: ".$e->getMessage();
        }
    }
}

$test = new Test('./questions.md');
$test->getAllQuestions();
$test->getQuestion(4);
?>
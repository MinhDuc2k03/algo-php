<?php
include "./QuestionsList.php";

class Test {
    private $filePath;

    public function __construct($path) {
        $this -> filePath = $path;
    }

    public function getAllQuestions() {
        $questionList = new QuestionsList([]);

        $questionList -> parse('./questions.md');
        print_r($questionList -> getAllQuestions());
    }

    public function getQuestion($n) {
        $questionList = new QuestionsList([]);
        
        $questionList->parse('./questions.md');
        print_r($questionList -> getQuestion($n));
    }
}

$test = new Test('./questions.md');
$test->getAllQuestions();
$test->getQuestion(4);
?>
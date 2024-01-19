<?php
require_once "./Question.php";
require_once "./QuestionsList.php";

class Test {
    private $filePath;

    public function __construct($path) {
        $this -> filePath = $path;
    }

    public function test1() {
        $questionList = new QuestionsList([]);
        try {
            $questionList->parse('./questions.md');
            print_r($questionList -> all());
        } catch (Exception $e) {
            echo "Meassage: ".$e->getMessage();
        }
    }

    public function test2() {
        $questionList = new QuestionsList([]);
        try {
            $questionList->parse('./questions.md');
            print_r($questionList -> getQuestion(4));
        } catch (Exception $e) {
            echo "Meassage: ".$e->getMessage();
        }
    }
}

$test = new Test('./questions.md');
$test->test1();
$test->test2();
?>
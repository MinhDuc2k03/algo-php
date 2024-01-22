<?php
include "./Question.php";

class QuestionsList {
    private $questions = [];

    public function __construct($questions) {
        $this -> questions = $questions;
    }


    public function parse($path) {
        if (file_exists($path)) {
            $fileContent = file_get_contents($path);

            $questionList = explode("###### ", $fileContent);
            array_shift($questionList);

            foreach ($questionList as $quest) {
                list($question, $answer) = explode("#### ", $quest);
                list($titles, $content) = explode('?', $question);
                list($number, $title) = explode('.', $titles);
                
                array_push($this -> questions, new Question($number, $title, $content, $answer));
            }
        }
        else {
            throw new \Exception("File không tìm thấy, kiểm tra lại đường dẫn " . $path);
        }
    }

    public function getAllQuestions() {
        return $this -> questions;
    }

    public function getQuestion(int $index) {
        return $this -> questions[$index];
    }
}
?>
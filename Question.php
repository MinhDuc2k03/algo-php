<?php
class Question {
    private $number;
    private $title;
    private $content;
    private $answer;

    public function __construct($number, $title, $content, $answer){
        $this -> number = $number;
        $this -> title = $title;
        $this -> content = $content;
        $this -> answer = $answer;
    }
}
?>
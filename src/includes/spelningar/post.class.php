<?php

/*
setTItle
setDate
setBody

getData
removePost
addPost

getTitle
getDate
getBody

*/


class Post {
    private $title = '';
    private $body = '';
    private $date = '';
    
    public function setTitle($value) {
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $this->title = $value;
    }
    public function setDate($value) {
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $this->date = $value;
    }
    public function setBody($value) {
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $this->body = $value;
    }
    
    public function getData() {
        $data = fopen('includes/spelningar/data.csv', "r") or die ("can't open file");
        return $data;
    }
    public function removePost($id) {
        $removeline = $id; // Vilken rad vi vill ta bort
        $removeline--; // Array börjar på 0 och ID på 1, så måste minusa ett
        
        $filearray = file('includes/spelningar/data.csv'); // Hela filen
        $removedata = $filearray[$removeline]; // Datan i arrayn av rader jag vill ta bort, removeline är vilken rad
        $file = file_get_contents('includes/spelningar/data.csv'); // get data.csv and hold content in $file var
        
        $data = str_replace($removedata, "", $file); // new line data, and add old $file data at the end
        if (file_put_contents('includes/spelningar/data.csv', $data)) { // replace entire file with new data + the old
            return true;
        } else {
            return false;
        }
    }
    public function addPost($meddelande, $namn, $date) {
        $this->setBody($meddelande);
        $this->setTitle($namn);
        $this->setDate($date); // format date correctly
        
        // använde fopen osv här från början men det va enklare att lägga till saker i början av filen genom file_get_contents hehe :)
        $file = file_get_contents('includes/spelningar/data.csv'); // get data.csv and hold content in $file var

        // find id of last row
        // $lastid = substr($file, -5);

        $data = $this->getTitle() . ", " . $this->getBody() . ", " . $this->getDate() . "\r\n" . $file; // new line data, and add old $file data at the end
        if (file_put_contents('includes/spelningar/data.csv', $data)) { // replace entire file with new data + the old
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        if ($username === "linushvenfelt@gmail.com" && $password === "tenorbanjo") {
            $_SESSION["admin"] = "true";
            return true;
        } else {
            return false;
        }
    }
    
    public function getTitle() {
        return $this->title;
    }
    public function getDate() {
        return $this->date;
    }
    public function getBody() {
        return $this->body;
    }
}


?>
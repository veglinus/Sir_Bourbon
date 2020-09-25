<?php
include_once 'includes/spelningar/post.class.php';

$posts = new Post(); // deklarera objekt
$data = $posts->getData(); // få data
$id = 0;

$now = new DateTime("now");
$currentyear = $now->format('Y');

while (!feof($data)) { // Whilst not end of file:
    
    $line = fgets($data); // get current line in  data
    $array = explode(",", $line); // explode line into array depending on semicolon
    
    if ($line != '') {
        $id++;
        $spelning = new Post; // new object
        $spelning->setTitle($array[0]); // set variables from file to object
        $spelning->setBody($array[1]);
        $spelning->setDate($array[2]);

        $oldtime = new DateTime($spelning->getDate());
        $time = strftime('%e %B %H:%M', $oldtime->getTimestamp());
        $time = ucwords($time);
        
        if ($now < $oldtime) {      
            if ($currentyear !== $otheryear = $oldtime->format('Y')) {
                
                echo "<h3>Spelningar $otheryear:</h3>";
            }

            echo "<div class='spelning'>";
            echo "<h3>" . $spelning->getTitle() . "</h3>";
            echo "<p>" . $time . "<br>" . $spelning->getBody() . "</p>";
            echo "</div>";
        }


    } else if ($id == 0) { // ID ökar enbart om raden inte är tom, dvs om raden är tom och ID är 0 så finns det inga inlägg.
        echo "<p>Det finns inga spelningar just nu!</p>";
    }
    
}

?>
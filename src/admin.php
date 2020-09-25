<?php
session_start();
include 'includes/header.php';
include_once 'includes/spelningar/post.class.php';
$object = new Post();

if (isset($_POST['login'])) {
    $result = $object->login($_POST['email'], $_POST['password']);

    if ($result === false) {
        echo "<p class='center'>Fel användarnamn eller lösenord!</p>";
    }
}

if (!isset($_SESSION['admin']) && $_SESSION !== 'true') {
    ?>
    <h2 class="center">Du är inte inloggad!</h2>

    <form class="center" action="admin.php" method="post">
    <input type="hidden" name="login" id="login" value="true">

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email"><br>

    <label for="password">Lösenord:</label><br>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Logga in">
    </form>

    <?php
} else {

if (isset($_REQUEST['remove'])) {
    $result = $object->removePost($_REQUEST['remove']);
    if ($result) {
        $message = 'Spelning borttagen!';
    } else {
        $message = 'Error vid borttagning.';
    }
}
if (isset($_POST['add'])) {
    $result2 = $object->addPost($_POST['meddelande'], $_POST['namn'], $_POST['date']);
    if ($result2) {
        $message = 'Spelning tillagd!';
    } else {
        $message = 'Error vid skapandet av inlägget.';
    }
}

?>
<div class="center">

    <h2>Lägg till ny spelning:</p>
    <form action="admin.php" method="post">
    <input type="hidden" name="add" id="add" value="true">
    <label for="namn">Titel:</label><br>
    <input type="text" name="namn" id="namn"><br>
    <label for="meddelande">Info:</label><br>
    <textarea name="meddelande" id="meddelande" cols="30" rows="10"></textarea><br>

    <label for="date">Datum och tid:</label><br>
    <input type="datetime-local" name="date" id="date"><br>

    <input type="submit" value="Skicka">
    </form>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <h2>Nuvarande spelningar:</h2>

    <section id="spelningar">
        <?php
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
                    echo "<a href='admin.php?remove=$id' onclick='return confirm('Are you sure?')' class='tabort'>Ta bort spelning</a></p>";
                    echo "</div>";
                }
        
        
            } else if ($id == 0) { // ID ökar enbart om raden inte är tom, dvs om raden är tom och ID är 0 så finns det inga inlägg.
                echo "<p class='center'>Det finns inga spelningar just nu!</p>";
            }
            
        }
        ?>
    </section>
</div>

<?php
}
include 'includes/footer.php';
?>
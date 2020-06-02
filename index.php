<!DOCTYPE html>
<html>
<head>
    <title> Абоненты </title>
    <link rel = "stylesheet" type ="text/css" href = "planner/css/style.css">
</head>
<body>
    <?php
        //error_reporting(0);
        include "planner/model/event_class.php";

        $events = new Event;
        if (!empty($_POST) && empty($_POST['dones']))
            $events->add_event();
            
        include "views/calendar.php";
        include "views/plans.php";
    ?>
</body>
</html>


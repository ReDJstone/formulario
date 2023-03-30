<?php
    session_start();

    if ($_SESSION['random_num'] == $_REQUEST['numero']) {
        echo "nice";
    } else {
        echo "nah";
    }

?>
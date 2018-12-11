<?php
        $conn = mysql_connect("localhost", "root", "") or die (mysql_error());
        // selection de la base de données
        mysql_select_db('db_boutique', $conn);
?>
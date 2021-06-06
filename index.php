<?php
session_start();
/* database aanroepen */

require_once('config/database.php');
/*header aanroepen */
require_once('layout/header.php');

/* pagina oproepen */
if (isset($_GET['page']) && !empty($_GET['page'])){
    $pages = ['login', 'home', 'logout', 'contact', 'klachtenkijken', 'klachtverwijderen', 'werknemerlogin', 'login', 'aanmelden', 'klachtindienen', 'profilepage', 'reserveren', 'inschrijven', 'uitschrijven', 'omgeving'];
    if (in_array($_GET['page'], $pages)){
        include_once($_GET['page'].'.php');
    } else {
        include_once('config/404.php');
    }
} else{
    include_once('home.php');
}
/* footer */
require_once('layout/footer.php');
?>
</html>
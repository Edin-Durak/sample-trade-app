<?php



unset($_SESSION['user']);

global $currentPageUri;

$logoutUri = '/logout';

### Redirect user to login page if request Uri is '/logout'
if ($currentPageUri == $logoutUri) {
    header('Location: /login');
}

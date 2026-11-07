<?php

# Simple dump and die function for debugging

function dd($value)
{

    echo '<pre>';
    var_dump($value);
    echo '<pre>';

    die();
}

### Check if the current URI is the same as the href
function isActiveUrl($uri, $href)
{

    if ($uri === $href) {
        echo 'is-active';
    }
}

### End session

function endSession()
{

    if (isset($_POST['signout']) && $_POST['signout'] == 'true') {
        unset($_SESSION['id']);
    }
}

endSession();

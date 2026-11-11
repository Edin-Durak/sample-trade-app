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

### Check if the user is active

function isUserActive($user, $db, $userId)
{

    $user->getUser($db, $userId);

    if ($user->isActive === 1) {
        return true;
    } elseif ($user->isActive === 0) {
        return false;
    }
}

### End session

function endSession()
{

    if (isset($_POST['signout']) && $_POST['signout'] == 'true') {
        unset($_SESSION['user']);
    }
}
### Instead of endSession we will create logout controller and ther we will check this logic to logout user
### endSession();

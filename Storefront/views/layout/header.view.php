<?php

$isAdmin = false;
if ($user->roleId == 1) {
    $isAdmin = true;
}

$roleType = ($isAdmin) ? 'Administrator' : 'Technician';

### Decleare these initial variables first and then check if user firstName and lastName exist to assign those values to them
### We avoid errors of non existing variables this way

$firstInit = false;
$lastInit = false;

if ($user->firstName) {
    $firstInit = mb_substr($user->firstName, 0, 1);
}

if ($user->firstName) {
    $firstInit = mb_substr($user->firstName, 0, 1);
}

?>


<header class="topbar">
    <button class="icon-btn sidebar-toggle" type="button" aria-label="Open menu">
        <span class="icon icon-menu" aria-hidden="true"></span>
    </button>

    <div class="topbar-section">Dashboard <span>· <?= $roleType ?> overview</span></div>

    <div class="topbar-right">
        <button class="icon-btn" type="button" aria-label="Notifications">
            <span class="icon icon-bell" aria-hidden="true"></span>
        </button>

        <details class="user-menu">
            <summary class="user-btn">
                <span class="avatar"><?= "$firstInit $lastInit" ?></span>
                <span class="user-meta">
                    <span class="user-name"><?= "$user->firstName  $user->lastName" ?></span>
                    <span class="user-role"><?= $roleType ?></span>
                </span>
                <span class="icon icon-chevron-down" aria-hidden="true"></span>
            </summary>

            <div class="dropdown-menu" role="menu">
                <div class="dropdown-identity">
                    <div class="user-name"><?= $user->firstName ?></div>
                    <div class="label-muted"><?= $user->email ?></div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=<?= "/profile?id{$user->id}" ?> role="menuitem">My profile</a>

                <form action="/login" method="POST">
                    <input type="hidden" name="signout" value="true">
                    <button class="dropdown-item" type="submit">
                        <span class="icon icon-sign-out" aria-hidden="true"></span>Sign out
                    </button>
                </form>
                <!--
                <a class="dropdown-item" href="/login" role="menuitem">
                    <span class="icon icon-sign-out" aria-hidden="true"></span>Sign out
                </a>
                -->
            </div>
        </details>
    </div>
</header>
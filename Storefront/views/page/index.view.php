<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/meta/head.view.php'; ?>

<body>
    <div class="app">
        <?php require __DIR__ . '/../layout/sidebar-view.php'; ?>

        <div class="main">
            <?php require __DIR__ . '/../layout/header.view.php'; ?>

            <main class="content">

                <?= $currentPageUri ?>
            </main>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php';



?>

<body>
    <div class="app">
        <?php require __DIR__ . '/../../layout/sidebar-view.php'; ?>

        <div class="main">
            <?php require __DIR__ . '/../../layout/header.view.php'; ?>

            <main class="content">
                <div class="stack">

                    <div class="page-header">
                        <div class="page-heading">
                            <h1 class="page-title">Laboratory technicians</h1>
                            <p class="page-subtitle">Accounts that can sign in to SampleTrail. New accounts receive an invitation to set their own password.</p>
                        </div>
                        <div class="page-actions">
                            <a class="btn btn-primary" href="/profile/create">Add technician</a>
                        </div>
                    </div>

                    <section class="card card-menu">
                        <div class="tabs" role="tablist" aria-label="Filter by account status">
                            <button class="tab is-active" type="button" role="tab" aria-selected="true">
                                All <span class="tab-count">6</span>
                            </button>
                            <button class="tab" type="button" role="tab" aria-selected="false">
                                Active <span class="tab-count">4</span>
                            </button>
                            <button class="tab" type="button" role="tab" aria-selected="false">
                                Invitation pending <span class="tab-count">1</span>
                            </button>
                            <button class="tab" type="button" role="tab" aria-selected="false">
                                Inactive <span class="tab-count">1</span>
                            </button>
                        </div>

                        <form class="toolbar" method="get" action="" role="search">
                            <div class="field">
                                <label class="label" for="u-q">Search by name or email</label>
                                <input class="input" id="u-q" name="q" type="search" placeholder="Name or email">
                            </div>
                            <div class="field">
                                <label class="label" for="u-role">Role</label>
                                <select class="select" id="u-role" name="role">
                                    <option value="all">All roles</option>
                                    <option value="technician">Laboratory technician</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                        </form>

                        <div class="table-wrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Full name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Account status</th>
                                        <th scope="col">Date added</th>
                                        <th scope="col" class="col-actions"><span class="visually-hidden">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td>
                                                <div class="row row-nowrap">
                                                    <span class="avatar" aria-hidden="true">
                                                        <?=
                                                        mb_substr($user['first_name'], 0, 1) . ((isset($user['last_name'])) ? mb_substr($user['last_name'], 0, 1) : '')
                                                        ?>
                                                    </span>
                                                    <span>
                                                        <span class="table-link"><?= htmlspecialchars($user['first_name']) . ' ' . ((isset($user['last_name'])) ? htmlspecialchars($user['last_name']) : '') ?></span>
                                                        <?php if ($user['role_id'] == 1) : ?>
                                                            <span class="cell-sub">Laboratory manager</span>
                                                        <?php elseif ($user['role_id'] == 2) : ?>
                                                            <span class="cell-sub">Laboratory technician</span>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars($user['email_address']) ?></td>
                                            <?php if ($user['role_id'] == 1) : ?>
                                                <td><span class="tag">Administrator</span></td>
                                            <?php elseif ($user['role_id'] == 2) : ?>
                                                <td><span class="tag">Laboratory technician</span></td>
                                            <?php endif ?>
                                            <td><span class="badge badge-<?= ($user['is_active']) ? 'active' : 'inactive' ?>"><?= ($user['is_active']) ? 'Active' : 'Inactive' ?></span></td>
                                            <td class="num nowrap"><?= date('d.m.Y', strtotime($user['created_at'])) ?></td>
                                            <td class="col-actions">
                                                <details class="row-menu">
                                                    <summary class="icon-btn" aria-label="Actions for Amra Selimović" aria-haspopup="menu">
                                                        <span aria-hidden="true">···</span>
                                                    </summary>
                                                    <div class="dropdown-menu" role="menu">
                                                        <button class="dropdown-item" type="button" role="menuitem">Change role</button>
                                                        <button class="dropdown-item" type="button" role="menuitem">Deactivate account…</button>
                                                        <div class="dropdown-divider"></div>
                                                        <button class="dropdown-item is-danger" type="button" role="menuitem">Delete account…</button>
                                                    </div>
                                                </details>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer pagination">
                            <span class="t-caption">Showing <span class="fw-semibold"><?= $usersCount ?></span> of <span class="fw-semibold"><?= $usersCount ?></span> accounts</span>
                            <div class="pagination-pages">
                                <button class="page-btn" type="button" disabled aria-label="Previous page">‹</button>
                                <button class="page-btn is-current" type="button" aria-current="page">1</button>
                                <button class="page-btn" type="button" disabled aria-label="Next page">›</button>
                            </div>
                        </div>
                    </section>

                    <p class="t-caption">
                        Administrators never see or set passwords. In the real application, the PHP backend emails a one-time setup link and stores only a password hash.
                    </p>

                </div>
            </main>
        </div>
    </div>
</body>

</html>
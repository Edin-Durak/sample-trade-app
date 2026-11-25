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
                        <form id="users-filter" method="get" action="">
                            <!--
                              Jedan izvor za status: hidden polje.
                              Tabovi ga samo mijenjaju pa submitaju (bez name="is_active" na dugmadima,
                              da se ne sudaraju dva is_active u istom requestu).
                            -->
                            <input type="hidden" name="search" value="true">
                            <input type="hidden" name="is_active" id="filter-is-active" value="<?= htmlspecialchars((string) $activeFilter) ?>">

                            <div class="tabs" role="tablist" aria-label="Filter by account status">
                                <button
                                    class="tab <?= (string) $activeFilter === 'all' ? 'is-active' : '' ?>"
                                    type="button"
                                    role="tab"
                                    data-is-active="all"
                                    aria-selected="<?= (string) $activeFilter === 'all' ? 'true' : 'false' ?>">
                                    All <span class="tab-count"><?= $allUsersCount ?></span>
                                </button>
                                <button
                                    class="tab <?= (string) $activeFilter === '1' ? 'is-active' : '' ?>"
                                    type="button"
                                    role="tab"
                                    data-is-active="1"
                                    aria-selected="<?= (string) $activeFilter === '1' ? 'true' : 'false' ?>">
                                    Active <span class="tab-count"><?= $activeUsersCount ?></span>
                                </button>
                                <button
                                    class="tab <?= (string) $activeFilter === '0' ? 'is-active' : '' ?>"
                                    type="button"
                                    role="tab"
                                    data-is-active="0"
                                    aria-selected="<?= (string) $activeFilter === '0' ? 'true' : 'false' ?>">
                                    Inactive <span class="tab-count"><?= $inactiveUsersCount ?></span>
                                </button>
                            </div>

                            <div class="toolbar" role="search">
                                <div class="field">
                                    <label class="label" for="u-q">Search by name or email</label>
                                    <input
                                        class="input"
                                        id="u-q"
                                        name="q"
                                        type="search"
                                        placeholder="Name or email"
                                        value="<?= $searchFilter !== false && $searchFilter !== null ? htmlspecialchars((string) $searchFilter) : '' ?>">
                                </div>
                                <div class="field">
                                    <label class="label" for="role_id">Role</label>
                                    <select class="select" id="role_id" name="role_id" onchange="this.form.submit()">
                                        <option value="all" <?= (string) $roleFilter === 'all' ? 'selected' : '' ?>>All roles</option>
                                        <option value="2" <?= (string) $roleFilter === '2' ? 'selected' : '' ?>>Laboratory technician</option>
                                        <option value="1" <?= (string) $roleFilter === '1' ? 'selected' : '' ?>>Administrator</option>
                                    </select>
                                </div>
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
                                                    <summary class="icon-btn" aria-label="Actions for <?= htmlspecialchars($user['first_name']) . ' ' . ((isset($user['last_name'])) ? htmlspecialchars($user['last_name']) : '') ?>" aria-haspopup="menu">
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

    <script>
        (function() {
            const form = document.getElementById('users-filter');
            const statusInput = document.getElementById('filter-is-active');
            const searchInput = document.getElementById('u-q');
            if (!form || !statusInput) return;

            form.querySelectorAll('.tabs .tab').forEach((button) => {
                button.addEventListener('click', () => {
                    statusInput.value = button.getAttribute('data-is-active');
                    form.submit();
                });
            });

            // type="search" fires "search" on Enter and on the clear (X) button
            if (searchInput) {
                searchInput.addEventListener('search', () => {
                    form.submit();
                });
            }
        })();
    </script>
</body>

</html>
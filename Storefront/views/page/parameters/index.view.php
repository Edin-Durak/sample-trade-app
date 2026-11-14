<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php'; ?>

<body>
    <div class="app">
        <?php require __DIR__ . '/../../layout/sidebar-view.php'; ?>

        <div class="main">
            <?php require __DIR__ . '/../../layout/header.view.php'; ?>

            <main class="content">
                <div class="stack">

                    <div class="page-header">
                        <div class="page-heading">
                            <h1 class="page-title">Measurement parameters</h1>
                            <p class="page-subtitle">General definitions shared by all sample types. Limits per sample type are set on each type’s “Configure parameters” page.</p>
                        </div>
                        <div class="page-actions">
                            <a class="btn btn-primary" href="/parameters/create">Create parameter</a>
                        </div>
                    </div>

                    <section class="card card-flush">
                        <form class="card-body form-grid" method="get" action="" role="search">
                            <div class="field">
                                <label class="label" for="pr-q">Search</label>
                                <input class="input" id="pr-q" name="q" type="search" placeholder="Name or code">
                            </div>
                            <div class="field">
                                <label class="label" for="pr-unit">Unit</label>
                                <select class="select" id="pr-unit" name="unit">
                                    <option value="all">All</option>
                                    <?php foreach ($parameters as $parameter) : ?>
                                        <option value="<?= htmlspecialchars($parameter['measurement_unit']) ?>"><?= htmlspecialchars($parameter['measurement_unit']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="field">
                                <label class="label" for="pr-status">Status</label>
                                <select class="select" id="pr-status" name="status">
                                    <option value="all">All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </form>

                        <div class="table-wrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Parameter</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Default unit</th>
                                        <th scope="col">Assigned sample types (limits per type)</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Last updated</th>
                                        <th scope="col"><span class="visually-hidden">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($parameters as $parameter) : ?>
                                        <tr>
                                            <td>
                                                <a href=<?= "/parameters/edit?{$parameter['id']}" ?>><?= htmlspecialchars($parameter['name']) ?></a>
                                                <div class="t-caption"><?= htmlspecialchars($parameter['description']) ?></div>
                                            </td>
                                            <td><span class="mono"><?= htmlspecialchars($parameter['short_code']) ?></span></td>
                                            <td><?= htmlspecialchars($parameter['measurement_unit']) ?></td>
                                            <td>
                                                <div class="row">
                                                    <a class="tag" href="#">RAW · 6.5–8.5</a>
                                                    <a class="tag" href="#">FILT · 6.8–7.8</a>
                                                    <a class="tag" href="#">COND · no limits</a>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-<?= ($parameter['active']) ? 'active' : 'Inactive' ?>">
                                                    <?= ($parameter['active']) ? 'Active' : 'Inactive' ?>
                                                </span></td>
                                            <td class="num"><?= date('d.m.Y', strtotime($parameter['updated_at'])) ?></td>
                                            <td>
                                                <div class="row row-end">
                                                    <a class="btn btn-ghost btn-sm" href=<?= "/parameters/edit?{$parameter['id']}" ?>>Edit</a>
                                                    <button class="btn btn-ghost btn-sm" type="button">Deactivate</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <span class="t-caption">Showing <span class="fw-semibold"><?= $parametersCount ?></span> of <span class="fw-semibold"><?= $parametersCount ?></span> parameters</span>
                        </div>
                    </section>

                    <p class="t-caption">
                        Tags show the limits configured for each sample type — the same parameter can have different limits per type.
                    </p>

                </div>
            </main>
        </div>
    </div>
</body>

</html>
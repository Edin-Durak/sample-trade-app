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

                    <div class="stack stack-sm">
                        <nav aria-label="Breadcrumb">
                            <div class="row">
                                <a href="/">Dashboard</a>
                                <span class="text-secondary" aria-hidden="true">/</span>
                                <a href="/parameters">Measurement parameters</a>
                                <span class="text-secondary" aria-hidden="true">/</span>
                                <span aria-current="page"><?= htmlspecialchars($name) ?></span>
                            </div>
                        </nav>

                        <div class="page-header">
                            <div class="page-heading">
                                <h1 class="page-title">Edit <?= htmlspecialchars($name) ?></h1>
                                <p class="page-subtitle">The general definition of a parameter. Limits for a specific sample type are set when you assign it to that type.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-main-aside">

                        <form class="card" method="post" action="" novalidate>
                            <div class="card-header">
                                <h2 class="card-title">General parameter definition</h2>
                                <span class="t-caption"><span class="req">*</span> Required field</span>
                            </div>

                            <div class="card-body">
                                <div class="form-grid">
                                    <div class="field">
                                        <label class="label" for="name">Parameter name<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="name" name="name" type="text" value="<?= htmlspecialchars($name) ?>" required>

                                        <?php if (isset($errors['nameErrorMessage'])) : ?>
                                            <p class="alert danger">
                                                <?= $errors['nameErrorMessage'] ?>
                                            </p>
                                        <?php endif ?>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="short_code">Unique short code<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input mono" id="short_code" name="short_code" type="text" maxlength="8" value="<?= htmlspecialchars($shortCode) ?>" required>
                                        <span class="help">2–8 capital letters or digits.</span>

                                        <?php if (isset($errors['codeErrorMessage'])) : ?>
                                            <p class="alert danger">
                                                <?= $errors['codeErrorMessage'] ?>
                                            </p>
                                        <?php endif ?>
                                    </div>

                                    <div class="field span-2">
                                        <label class="label" for="description">Description <span class="optional">(optional)</span></label>
                                        <textarea class="textarea" id="description" name="description" rows="2"><?= htmlspecialchars($description) ?></textarea>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="measurement_unit">Unit of measurement<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="measurement_unit" name="measurement_unit" type="text" value="<?= htmlspecialchars($measurementUnit) ?>" required>
                                        <span class="help">Default unit. A sample type can use a different one.</span>

                                        <?php if (isset($errors['unitErrorMessage'])) : ?>
                                            <p class="alert danger">
                                                <?= $errors['unitErrorMessage'] ?>
                                            </p>
                                        <?php endif ?>
                                    </div>

                                    <div class="field">
                                        <span class="label">Status</span>
                                        <label class="row">
                                            <input type="checkbox" name="active" value="<?= htmlspecialchars($active) ?>" checked>
                                            <span>Active — can be assigned</span>
                                        </label>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="minimum">Default minimum <span class="optional">(optional)</span></label>
                                        <div class="row">
                                            <input class="input num" id="minimum" name="minimum" type="text" inputmode="decimal" placeholder="Not set" value="<?= $minimum ?>">
                                            <span class="t-caption"><?= htmlspecialchars($measurementUnit) ?> units</span>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="maximum">Default maximum <span class="optional">(optional)</span></label>
                                        <div class="row">
                                            <input class="input num" id="maximum" name="maximum" type="text" inputmode="decimal" placeholder="Not set" value="<?= $maximum ?>">
                                            <span class="t-caption"><?= htmlspecialchars($measurementUnit) ?> units</span>
                                        </div>
                                    </div>

                                    <div class="span-2 t-caption">
                                        Default limits are only a starting point. They are never applied to sample types automatically — an administrator copies them explicitly when assigning the parameter, and can change them per type.
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row row-end">
                                    <a class="btn btn-secondary" href="/parameters">Cancel</a>
                                    <input type="hidden" name="parameter" value="true">
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>

                        <aside class="stack">
                            <section class="card">
                                <div class="card-header">
                                    <h2 class="card-title">Assigned to sample types</h2>
                                </div>
                                <div class="card-body stack-sm">
                                    <div>
                                        <div class="row">
                                            <a href="#">Raw Incoming Water</a>
                                            <span class="tag tag-required">Required</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: 6.5 – 8.5 pH units</div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <a href="#">Water After Filtration</a>
                                            <span class="tag tag-required">Required</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: 6.8 – 7.8 pH units</div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <a href="#">Condensate Water</a>
                                            <span class="tag">Optional</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: Not configured pH units</div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <a href="#">Boiler Feed Water</a>
                                            <span class="tag tag-required">Required</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: 8.5 – 9.5 pH units</div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <a href="#">Cooling Tower Circulating Water</a>
                                            <span class="tag">Optional</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: 7.0 – 8.5 pH units</div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <a href="#">Treated Effluent</a>
                                            <span class="tag tag-required">Required</span>
                                        </div>
                                        <div class="t-caption">Limits for this type: 6.0 – 9.0 pH units</div>
                                    </div>
                                </div>
                            </section>
                        </aside>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
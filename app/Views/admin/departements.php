<?= view('admin/layout/header', [
    'title' => 'GESTION DÉPARTEMENTS',
    'sectionId' => 'page-admin-departements',
]) ?>
<?= view('admin/sidebar/sidebar', [
    'activePage' => 'departments',
    'userInitials' => 'AD',
    'userName' => 'Administrateur',
    'userRole' => 'Admin système',
]) ?>

<div class="main">
    <div class="topbar">
        <div>
            <div class="topbar-title">Gestion des départements</div>
            <div class="topbar-breadcrumb"><a href="<?= base_url('admin/dashboard') ?>">Admin</a> <i class="bi bi-chevron-right" style="font-size:.6rem"></i> Départements</div>
        </div>
    </div>

    <div class="content">

        <?php $success = session()->getFlashdata('success'); ?>
        <?php $error = session()->getFlashdata('error'); ?>

        <?php if ($success): ?>
            <div class="flash flash-success">
                <i class="bi bi-check-circle-fill"></i>
                <?= esc($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="flash flash-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?= esc($error) ?>
            </div>
        <?php endif; ?>

        <div class="form-section">
            <h3><i class="bi bi-building" style="color:var(--forest);margin-right:6px"></i>Ajouter un département</h3>
            <form action="<?= base_url('admin/departements') ?>" method="post">
                <?= csrf_field() ?>
                <div class="f-group" style="max-width:420px">
                    <label class="f-label" for="department-name">Nom du département</label>
                    <input
                        id="department-name"
                        type="text"
                        name="name"
                        class="f-input"
                        placeholder="Ex: Informatique"
                        value="<?= esc(old('name')) ?>"
                        required />
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-forest"><i class="bi bi-plus"></i> Créer le département</button>
                    <button type="reset" class="btn-secondary">Réinitialiser</button>
                </div>
            </form>
        </div>

        <div class="data-card">
            <div class="data-card-head">
                <h3>Tous les départements</h3>
            </div>
            <table class="tbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($departements)): ?>
                        <?php foreach ($departements as $departement): ?>
                            <tr>
                                <td class="td-mono"><?= esc((string) $departement['id_department']) ?></td>
                                <td class="td-name"><?= esc($departement['name']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="td-muted">Aucun département pour le moment.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= view('admin/footer/footer', [
    'footerYear' => '2025',
    'footerText' => 'TechMada RH',
]) ?>
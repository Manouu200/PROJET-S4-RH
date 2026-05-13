<?php
$activePage = $activePage ?? '';
$userInitials = $userInitials ?? 'SR';
$userName = $userName ?? 'Soa Rakoto';
$userRole = $userRole ?? 'Employé · IT';
$showMenuLabel = $showMenuLabel ?? false;
$brandIcon = $brandIcon ?? 'bi-briefcase';
$brandSubTitle = $brandSubTitle ?? 'Espace employé';
$homeLink = $homeLink ?? '#page-dashboard-employe';
$createLink = $createLink ?? '#page-form-conge';
$listLink = $listLink ?? '#page-mes-conges';
$profileLink = $profileLink ?? '#page-profil-employe';
$showBadge = $showBadge ?? false;
$badgeCount = $badgeCount ?? '2';
$logoutLink = $logoutLink ?? '';
?>
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-logo-icon"><i class="bi <?= esc($brandIcon) ?>"></i></div>
        <div class="sidebar-brand-name">TechMada RH<span><?= esc($brandSubTitle) ?></span></div>
    </div>
    <?php if ($showMenuLabel): ?>
        <div class="sidebar-section">Menu</div>
    <?php endif; ?>
    <ul class="sidebar-nav"<?= $showMenuLabel ? '' : ' style="margin-top:1rem"' ?>>
        <li><a href="<?= esc($homeLink) ?>" class="<?= $activePage === 'dashboard' ? 'active' : '' ?>"><i class="bi bi-grid-1x2"></i> Tableau de bord</a></li>
        <li><a href="<?= esc($createLink) ?>" class="<?= $activePage === 'create' ? 'active' : '' ?>"><i class="bi bi-plus-circle"></i> Nouvelle demande</a></li>
        <li>
            <a href="<?= esc($listLink) ?>" class="<?= $activePage === 'index' ? 'active' : '' ?>">
                <i class="bi bi-calendar3"></i> Mes demandes
                <?php if ($showBadge): ?>
                    <span class="nav-badge alert"><?= esc($badgeCount) ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li><a href="<?= esc($profileLink) ?>"><i class="bi bi-person"></i> Mon profil</a></li>
    </ul>
    <div class="sidebar-user">
        <div class="s-user-row">
            <div class="avatar av-green"><?= esc($userInitials) ?></div>
            <div>
                <div class="user-name"><?= esc($userName) ?></div>
                <div class="user-role"><?= esc($userRole) ?></div>
            </div>
            <?php if ($logoutLink !== ''): ?>
                <a href="<?= esc($logoutLink) ?>" style="margin-left:auto;color:rgba(255,255,255,.25);font-size:1.1rem" title="Déconnexion"><i class="bi bi-box-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</aside>

<?php
function outputBreadcrumbs($page, $subpage = '') {
    $baseUrl = "https://insightned.com";
    ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo $baseUrl; ?>" itemprop="item">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <?php if ($page !== 'home'): ?>
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo $baseUrl . '/' . $page . '.html'; ?>" itemprop="item">
                    <span itemprop="name"><?php echo ucfirst($page); ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
            <?php endif; ?>
            <?php if ($subpage): ?>
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo $baseUrl . '/' . $page . '/' . $subpage . '.html'; ?>" itemprop="item">
                    <span itemprop="name"><?php echo str_replace('-', ' ', ucfirst($subpage)); ?></span>
                </a>
                <meta itemprop="position" content="3" />
            </li>
            <?php endif; ?>
        </ol>
    </nav>
    <?php
}
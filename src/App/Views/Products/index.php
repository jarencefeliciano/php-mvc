<h1>Products</h1>

<?php foreach ($products as $product): ?>

<h2>
    <a href="/products/show/<?= $product["id"] ?>">
        <?= htmlspecialchars($product["name"]) ?>
    </a>
</h2>

<?php endforeach; ?>

<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between mt-6 gap-3">
    <!-- Previous Page -->
    <a href="<?= $pager->getPreviousPage('warga') ?>"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50 transition">
        ← Previous
    </a>

    <!-- Pagination Numbers -->
    <div class="flex items-center space-x-1">
        <?php foreach ($pager->links() as $link): ?>
            <?php if ($link['active']) : ?>
                <span class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 rounded-md shadow">
                    <?= $link['title'] ?>
                </span>
            <?php else : ?>
                <a href="<?= $link['uri'] ?>"
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50 transition">
                    <?= $link['title'] ?>
                </a>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <!-- Next Page -->
    <a href="<?= $pager->getNextPage('warga') ?>"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50 transition">
        Next →
    </a>
</nav>
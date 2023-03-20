<?php $pager->setSurroundCount(5) ?>
<!-- <style>
    .dawpageactive {
        font-weight: bolder;
        text-decoration: overline;
    }
</style> -->
<!-- 

<nav>
    <?php if ($pager->hasPreviousPage()) : ?>
        <span>
            <a href="<?= $pager->getFirst() ?>">&lt;&lt;</a></span>
        <span>
            <a href="<?= $pager->getPreviousPage() ?>">&lt;</a>
        </span>
    <?php else : ?>
        <span>&lt;&lt;</span>
        <span>&lt;</span>
    <?php endif ?>

    <span>&nbsp;</span>
    <?php foreach ($pager->links() as $link) : ?>
        <span <?= $link['active'] ? 'class="dawpageactive"' : '' ?>>
            <a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></span>
        <span>&nbsp;</span>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
        <span>
            <a href="<?= $pager->getNextPage() ?>">&gt;</a>
        </span>
        <span>
            <a href="<?= $pager->getLast() ?>">&gt;&gt;</a>
        </span>
    <?php else : ?>
        <span>&gt;</span>
        <span>&gt;&gt;</span>
    <?php endif ?>
</nav> -->


<nav class="mt-3">
    <ul class="pagination">
    <?php if ($pager->hasPreviousPage()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getFirst() ?>">&lt;&lt;</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPreviousPage() ?>">&lt;</a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="#" class="page-link disabled"> &lt;&lt;</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link disabled"> &lt;</a>
                </li>
            <?php endif ?>
        
            <?php foreach ($pager->links() as $link) : ?>
                <li  <?= $link['active'] ? 'class="page-item active"' : 'class="page-item"' ?>>
                    <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
                </li>
                
            <?php endforeach ?>
        
            <?php if ($pager->hasNextPage()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNextPage() ?>">&gt;</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getLast() ?>">&gt;&gt;</a>
                </li>
            <?php else : ?>
                <li class="page-item"> <a href="#" class=" page-link disabled">
                    &gt;
                    </a> 
                </li>
                <li class="page-item"> <a href="#"  class="page-link disabled">
                    &gt;&gt;    
                    </a> </li>
            <?php endif ?>
        </ul>
</nav>
<?php

/**
 * @var $title string
 * @var $comment CommentModel
 */

use App\Models\CommentModel;

?>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h2>name: <?= esc($comment['name']) ?></h2>
        <p><b>text:</b> <?= esc($comment['text']) ?></p>
        <p><b>date:</b> <?= esc(date('d.m.Y H:i:s', ($comment['date'] ?? time()))) ?></p>
        <div>
            <a href="/comment" class="btn btn-sm btn-outline-primary">Back</a>
            <a href="/comment/edit/<?= $comment['id'] ?>" class="btn btn-sm btn-secondary">edit</a>
            <a href="/comment/delete/<?= $comment['id'] ?>" class="btn btn-sm btn-outline-secondary">delete</a>
        </div>
    </div>
</div>


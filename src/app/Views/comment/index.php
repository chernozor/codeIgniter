<?php
/**
 * @var $title string
 * @var $comments CommentModel
 **/

use App\Models\CommentModel;

?>

<div class="table">
    <a class="btn btn-sm btn-outline-primary" href="/comment/new">Create</a>
</div>

<div class="col-xs-12 alert alert-success">
    sort bar here
</div>

<?php if (!empty($comments) && is_array($comments)) { ?>
    <div class="row">
        <?php foreach ($comments as $comment) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="border">
                    <h3><?= esc($comment['name']) ?></h3>
                    <div class="main">
                        <?= esc($comment['text']) ?>
                    </div>
                    <div class="p">
                        <a href="/comment/show/<?= esc($comment['id'], 'url') ?>"
                           class="btn btn-sm btn-outline-primary">View</a>
                    </div>
                    <!--if need ajax actions add script here -->
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <h3>No Comments</h3>
    <p>Unable to find any comment</p>
<?php } ?>

<br/>
<div class="col-xs-12 alert alert-success">
    sort bar here
</div>

<div class="table">
    <div id="collapseAdd" class="collapse">
        <br/>
        <?php
        helper('form');
        echo view('comment/create');
        ?>
    </div>
</div>
<a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" href="#collapseAdd" role="button"
   aria-expanded="false" aria-controls="collapseAdd">
    Add New
</a>

<div class="table">
    <!--if need ajax add script here -->
    <br/>
    <!--if need ajax delete script here -->
    <br/>
    <!--if need ajax control script here -->
</div>

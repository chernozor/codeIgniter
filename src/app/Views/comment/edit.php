<?php

/**
 * @var $title string
 * @var $comment CommentModel
 */

use App\Models\CommentModel;

?>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        for Edit must post here
        field with new Date value
        <div>
            <a href="/comment" class="btn btn-sm btn-outline-primary">Back</a>
            <a href="/comment/edited/<?php //echo $comment['id'] ?>" class="btn btn-sm btn-outline-secondary">Save</a>
        </div>
    </div>
</div>


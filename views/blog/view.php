<article id="post-<?=$record->id?>">
    <div class="post-slider">
        <div class="post-heading">
            <h3><a href="#"><?=$record->title?></a></h3>
        </div>
        <!-- start flexslider -->
        <div class="intro-image">
            <ul class="slides">
                <li>
                    <img src="/img/dummies/blog/img3.jpg" alt="" />
                </li>
            </ul>
        </div>
        <!-- end flexslider -->
    </div>
    <p>
        <?=$record->article?>
    </p>
    <div class="bottom-article">
        <ul class="meta-post">
            <li><i class="icon-calendar"></i><a href="#"><?=\Yii::t('app', 'Today is {0, date, yyyy-MM-dd}', $record->date);?></a></li>
            <li><i class="icon-user"></i><a href="#"> <?=$record->author_id?></a></li>
            <li><i class="icon-folder-open"></i><a href="<?=$record->categories->getUrl()?>"> <?=$record->categories->title?></a></li>
            <li><i class="icon-comments"></i><a href="#">Tags</a></li>
        </ul>
    </div>
</article>
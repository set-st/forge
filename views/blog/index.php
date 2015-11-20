<?php

$this->title = Yii::t('app', 'Blog');

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Blog'), 'url' => '/blog'],
];

?>

<?php foreach($records->models as $record){?>
<article id="post-<?=$record->id?>">
    <div class="post-slider">
        <div class="post-heading">
            <h3><a href="#"><?=$record->title?></a></h3>
        </div>
        <!-- start flexslider -->
        <div id="post-slider" class="flexslider post-slider-slides">
            <ul class="slides">
                <li>
                    <img src="/img/dummies/blog/img1.jpg" alt="" />
                </li>
                <li>
                    <img src="/img/dummies/blog/img2.jpg" alt="" />
                </li>
                <li>
                    <img src="/img/dummies/blog/img3.jpg" alt="" />
                </li>
            </ul>
        </div>
        <!-- end flexslider -->
    </div>
    <p>
        <?=$record->intro?>
    </p>
    <div class="bottom-article">
        <ul class="meta-post">
            <li><i class="icon-calendar"></i><a href="#"> <?=$record->date?></a></li>
            <li><i class="icon-user"></i><a href="#"> <?=$record->author_id?></a></li>
            <li><i class="icon-folder-open"></i><a href="<?=$record->categories->getUrl()?>"> <?=$record->categories->title?></a></li>
            <li><i class="icon-comments"></i><a href="#">0 Comments</a></li>
        </ul>
        <a href="<?=$record->getUrl()?>" class="pull-right"><?=Yii::t('app', 'Continue reading')?> <i class="icon-angle-right"></i></a>
    </div>
</article>
<?php }?>

<?php
echo \yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
    'options' => ['id' => 'pagination'],
    'prevPageLabel'=>Yii::t('app', 'First'),
    'nextPageLabel'=>Yii::t('app', 'Last')
]);
?>
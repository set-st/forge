<?php

use yii\widgets\Breadcrumbs;

?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <!--
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active">Blog</li>
                    </ul>
                    -->
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <?= $content ?>
        </div>
    </section>
<?php $this->endContent(); ?>
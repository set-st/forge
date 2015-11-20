<ul class="cat">
<?php
foreach($tree as $index => $category){
?>
    <li><i class="icon-angle-right"></i><a href="/blog<?=($category['user_id']!=0?'/'.$category['user_id']:'')?>/<?=$index?>"><?=$category['title']?></a><span> (<?=$category['records_count']?>)</span></li>
<?php
    if(!empty($category['childs'])){
        echo '<li>'.
            $this->render('/blog/categories_list', [
                'tree' => $category['childs'],
            ]).
            '</li>';
    }
}
?>
</ul>
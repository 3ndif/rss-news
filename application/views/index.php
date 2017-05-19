

<div class="fix main_content floatleft">
    <div class="fix single_content_wrapper">
        <?php
            foreach ($rssNews as $news) :
        ?>

        <div class="fix single_content floatleft">
            <a href="<?= $news->source_link?>" target="blank"><img src="<?= $news->img?>" alt=""/></a>
            <div class="fix single_content_info">
                    <h1><a href="<?=$news->source_link?>" target="blank"><?= $news->title?></a></h1>
                    <p class="author">Источник: </p>
                    <p><?= $news->content?></p>
                    <div class="fix post-meta">
                        <p><?= date('d.m.Y')?></p>
                    </div>
            </div>

        </div>

        <?php endforeach; ?>



    </div>

    <div class="pagination fix">
            <a href="">1</a>
            <a href="">1</a>
            <a href="">1</a>
            <a href="">1</a>
            <a href="">1</a>
            <a href="">1</a>
    </div>
</div>
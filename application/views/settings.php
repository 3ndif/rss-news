<?php
use application\models\Keywords;
//var_dump((new application\models\RssGraber)->get());die;
?>
<!-- begin side tab section -->
<div class="fix main_content floatleft">
    <div class="nav-tabs-three">
                <!-- Design Three Sidebar -->
                <div class="nav-tabs-three-sidebar">
                    <ul class="nav">
                        <li class="active"><a href="#tab1" data-toggle="tab" role="tab" aria-expanded="true"><i class="fa fa-angle-right"></i>Основные ключевые слова</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab" role="tab" aria-expanded="false">Региональные слова</a></li>
                        <li class=""><a href="#tab3" data-toggle="tab" role="tab" aria-expanded="false">Образоование</a></li>
                    </ul>
                </div>
                <!-- Design Three Content -->
                <div class="nav-tabs-three-content">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                                <div id="keyword-container" class="dual-list list-left col-md-5">
                                    <div class="well text-right">
                                        <div class="row">
                                            <div class="col-md-12 group-append">
                                                    <input type="text" name="keyword" class="form-control" placeholder="" />
                                                    <button type="button" class="btn btn-default keyword-append"
                                                            data-types-id="<?= Keywords::getType(Keywords::MAIN_KEYWORDS_ALIAS)->id?>">
                                                        Добавить
                                                    </button>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group">
                                            <?php foreach ($mainKeywords as $keyword) { ?>
                                                <li class="list-group-item" data-id="<?= $keyword->id?>">
                                                    <?= $keyword->keyword?>
                                                </li>
                                            <? } ?>
                                        </ul>

                                        <button type="button" class="btn btn-default keyword-delete">Удалить</button>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">

                                <div id="region-keyword-container" class="dual-list list-left col-md-5">
                                    <div class="well text-right">
                                        <div class="row">
                                            <div class="col-md-12 group-append">
                                                    <input type="text" name="keyword" class="form-control" placeholder="" />
                                                    <button type="button" class="btn btn-default keyword-append"
                                                            data-types-id="<?= Keywords::getType(Keywords::REGION_KEYWORDS_ALIAS)->id?>">
                                                        Добавить
                                                    </button>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group">
                                            <?php foreach ($regionKeywords as $keyword) { ?>
                                                <li class="list-group-item" data-id="<?= $keyword->id?>">
                                                    <?= $keyword->keyword?>
                                                </li>
                                            <? } ?>
                                        </ul>

                                        <button type="button" class="btn btn-default keyword-delete">Удалить</button>
                                    </div>
                                </div>

                        </div>
                        <div class="tab-pane fade" id="tab3">

                                <div id="education-keyword-container" class="dual-list list-left col-md-5">
                                    <div class="well text-right">
                                        <div class="row">
                                            <div class="col-md-12 group-append">
                                                    <input type="text" name="keyword" class="form-control" placeholder="" />
                                                    <button type="button" class="btn btn-default keyword-append"
                                                            data-types-id="<?= Keywords::getType(Keywords::EDUCATION_KEYWORDS_ALIAS)->id?>">
                                                        Добавить
                                                    </button>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="btn-group">
                                                    <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group">
                                            <?php foreach ($educationKeywords as $keyword) { ?>
                                                <li class="list-group-item" data-id="<?= $keyword->id?>">
                                                    <?= $keyword->keyword?>
                                                </li>
                                            <? } ?>
                                        </ul>

                                        <button type="button" class="btn btn-default keyword-delete">Удалить</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


            </div>
</div>
<!-- end side tab section -->

<script type="text/javascript">
$('*[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      var target = $(this).attr('href');

    $(target).css('left','-'+$(window).width()+'px');
    var left = $(target).offset().left;
    $(target).css({left:left}).animate({"left":"0px"}, 1500);
})

$(function () {

    /*
     * Выделяем элемент при нажатии на него
     */
    $('body').on('click', '.list-group .list-group-item', function () {
        $(this).toggleClass('active');
    });


    /**
     * Выделяем все элементы
     */
     $('.dual-list .selector').click(function () {
         var $checkBox = $(this);
         if (!$checkBox.hasClass('selected')) {
             $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
             $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
         } else {
             $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
             $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
         }
     });

     /**
      * Поиск по элементам
      */
     $('[name="SearchDualList"]').keyup(function (e) {
         var code = e.keyCode || e.which;
         if (code == '9') return;
         if (code == '27') $(this).val(null);
         var $rows = $(this).closest('.dual-list').find('.list-group li');
         var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
         $rows.show().filter(function () {
             var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
             return !~text.indexOf(val);
         }).hide();
     });

});

        /**
         * Удаляем выбранные элементы
         */
        $('.keyword-delete').click(function(){
            var $rows = $(this).closest('.dual-list').find('.list-group li.active');

            var ids = [];  // переменная, которая будет хранить id выбранных слов

            $rows.each(function(index, element){
                ids.push($(element).attr('data-id'));
            });

            $.post('/delete',{
                ids: ids
            },function(data){
                $rows.remove();
            });
        });

        $('.keyword-append').click(function(){
            var value = $(this).closest('.dual-list').find('.group-append input').val(),
                types_id = $(this).attr('data-types-id'),
                list_container = $(this).closest('.dual-list').find('.list-group');

            $.ajax({
                type: "POST",
                url: "/keywordappend",
                data: {
                    keyword: value,
                    types_id: types_id
                },
                dataType:'json', //or HTML, JSON, etc.
                success: function(data){
                    console.log(data)
                    list_container.append('<li class="list-group-item" data-types-id="'+data.types_id+'">'+value+'</li>');
                },
            });
        });
</script>

<style>
   /* Nav tabs */

.tab-content .tab-pane {
    position: relative;
}


.active.in {
z-index: 0;
}
/* Nav tabs style 3 */
.nav-tabs-three .nav-tabs-three-sidebar {
    width:200px;
    float:left;
}
.nav-tabs-three .nav-tabs-three-sidebar ul{
    padding:0px;
    margin:0px;
}
.nav-tabs-three .nav-tabs-three-content{
    margin-left:150px;
    overflow: hidden;
}
@media (max-width: 990px){
    .nav-tabs-three{
        max-width:400px;
        margin:10px auto;
    }
    .nav-tabs-three .nav-tabs-three-sidebar{
        width:100%;
        float:none;
        position:static;
      text-align: center;
    }
    .nav-tabs-three .nav-tabs-three-content{
        margin-left:0px !important;
        margin-top:20px;
    }
}
.nav-tabs-three ul.nav li a{
    font-size:16px;
    padding:12px 12px;
    background:#fff;
    border: none;
    border-radius:3px;
    margin-bottom:5px;
    color:#555;
}
.nav-tabs-three ul.nav  li:hover a{
    color: #666;
}
.nav-tabs-three ul.nav li.active a{

  color: #333;
}
.nav-tabs-three .tab-content{
    border-radius:5px;

}

.nav-tabs-three .tab-content h4 {
  font-weight: 600;
  font-size: 24px;
  text-align: center;
  margin-bottom: 12px;
  padding-bottom: 12px;
  color: #666;

}
.nav-tabs-three .tab-content ul {
    list-style-type: disc;
}

.dual-list{
    width: 100%;
}

 .dual-list .list-group {
    margin-top: 8px;
}

.list-left li, .list-right li {
    cursor: pointer;
}

.dual-list .group-append {
    margin-bottom: 20px;
}

.dual-list .group-append input {
    float: left;
    width: 77%;
}

</style>
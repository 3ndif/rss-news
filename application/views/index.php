<html>
<head>
        <title>Новости</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font/font.css">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="css/responsive.css" rel="stylesheet" media="screen">
</head>

<body>
        <div class="fix header_area">
                <div class="fix wrap header">
                        <div class="logo floatleft">
                                <h1>Новости</h1>
                        </div>
                        <div class="manu floatright">
                                <ul id="nav-top">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="contact.html">Контакты</a></li>
                                        <li><a href="contact.html">Управление</a></li>
                                </ul>
                        </div>
                </div>
        </div>

        <div class="fix content_area">

                    <div class="fix top_add_bar">
                            <div class="addbar_leaderborard"><img src="http://placehold.it/728x90"/></div>
                    </div>

                    <div class="manu_area">
                            <div class="mainmenu menu-wrap wrap">
                                <ul id="nav-bottom">
                                        <li><a href="">Образование</a></li>
                                        <li><a href="">Прочее</a>
                                                <ul>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                </ul>
                                        </li>
                                </ul>
                            </div>
                    </div>
                <div class="fix wrap content_wrapper">
                        <div class="fix content">
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
                                                        <p><?= date('d.m.Y')?> |  24 Комментария</p>
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
                                <div class="fix sidebar floatright">
                                        <div class="fix single_sidebar">
                                                <div class="popular_post fix">
                                                        <h2>Популярное</h2>
                                                        <div class="fix single_popular">
                                                                <img src="images/popular.png" class="floatleft"/>
                                                                <a href="#"><h2>Заголовок</h2></a>
                                                                <p>Дата</p>
                                                        </div>
                                                        <div class="fix single_popular">
                                                                <img src="images/popular.png" class="floatleft"/>
                                                                <a href="#"><h2>Заголовок</h2></a>
                                                                <p>Дата</p>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="fix single_sidebar">
                                                        <h2>Поиск</h2>
                                                        <input class="search" type="text" placeholder=""/>
                                        </div>
                                        <div class="fix single_sidebar">
                                                <h2>Немного обо мне</h2>
                                                <p>блабла балабалаб бла</p>
                                        </div>
                                        <div class="fix single_sidebar">
                                                <h2>Категории</h2>
                                                <a href="№">Образование(5)</a>
                                        </div>
                                </div>
                        </div>


                </div>

                <div class="fix bottom_add_bar">
                        <div class="addbar_leaderborard"><img src="http://placehold.it/728x90"/></div>
                </div>

        </div>

        <div class="fix footer_top_area">
            <!--<div class="fix footer_top wrap">-->
<!--                <div class="fix footer_top_container">
                        <div class="fix single_footer floatleft">
                                <h2>From Twitter</h2>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id ultricies vehicula ut id elit. <br/><br/>Cum sociis natoque penatibus et magnis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis. </p>
                                <br/><p>Cum sociis natoque penatibus et magnis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
                        </div>
                        <div class="fix single_footer floatleft">
                            <h2>Полезные ссылки</h2>
                            <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">about us</a></li>
                                    <li><a href="">privacy policy</a></li>
                                    <li><a href="">contact us</a></li>
                            </ul>
                        </div>
                        <div class="fix single_footer floatleft">
                            <div class="popular_post fix">
                                <h2>Популярное</h2>
                                <div class="fix single_popular">
                                        <img src="images/popular.png" class="floatleft"/>
                                        <a href=""><h2>Заголовок</h2></a>
                                        <p>Дата</p>
                                </div>
                                <div class="fix single_popular">
                                        <img src="images/popular.png" class="floatleft"/>
                                        <a href=""><h2>Заголовок</h2></a>
                                        <p>Дата</p>
                                </div>
                            </div>
                        </div>
                </div>-->
            <!--</div>-->
        </div>
<!--        <div class="fix footer_area">
                <div class="wrap">
                <div class="fix social_area floatright">
                        <ul>
                            <li><a href="" class="feed"></a></li>
                            <li><a href="" class="facebook"></a></li>
                            <li><a href="" class="twitter"></a></li>
                            <li><a href="" class="drible"></a></li>
                            <li><a href="" class="flickr"></a></li>
                            <li><a href="" class="pin"></a></li>
                            <li><a href="" class="tumblr"></a></li>
                        </ul>
                </div>
                </div>
        </div>-->
        <script type="text/javascript" src="js/placeholder_support_IE.js"></script>
        <script type="text/javascript" src="js/selectnav.min.js"></script>
        <script type="text/javascript">
                selectnav('nav-top', {
                  label: '-Navigation-',
                  nested: true,
                  indent: '-'
                });

                selectnav('nav-bottom', {
                  label: '-Navigation-',
                  nested: true,
                  indent: '-'
                });
        </script>
        <script src="http://code.jquery.com/jquery.js"></script>
</body>
</html>

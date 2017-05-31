<html>
<head>
        <title>Новости</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font/font.css">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="css/responsive.css" rel="stylesheet" media="screen">

        <script type="text/javascript" src="js/placeholder_support_IE.js"></script>
        <!--<script type="text/javascript" src="js/selectnav.min.js"></script>-->
        <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
        <div class="fix header_area">
                <div class="fix wrap header">
                        <div class="logo floatleft">
                                <h1>Новости</h1>
                        </div>
                        <div class="manu floatright">
                                <ul id="nav-top">
                                        <!--<li><a href="/">Home</a></li>-->
                                        <li><a href="settings">Управление</a></li>
                                </ul>
                        </div>
                </div>
        </div>

        <div class="fix content_area">

                    <div class="fix top_add_bar">
                            <!--<div class="addbar_leaderborard"><img src="http://placehold.it/728x90"/></div>-->
                    </div>

                    <div class="manu_area">
                            <div class="mainmenu menu-wrap wrap">
                                <ul id="nav-bottom">
                                        <li><a href="/">Общие</a></li>
                                        <li><a href="/education">Образование</a></li>
                                        <li><a href="/region">Региональные</a></li>
<!--                                        <li><a href="">Прочее</a>
                                                <ul>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                    <li><a href="">Single item</a></li>
                                                </ul>
                                        </li>-->
                                </ul>
                            </div>
                    </div>
                <div class="fix wrap content_wrapper">
                        <div class="fix content">
                                <?= $content;?>
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
<!--                                        <div class="fix single_sidebar">
                                                        <h2>Поиск</h2>
                                                        <input class="search" type="text" placeholder=""/>
                                        </div>-->
                                        <div class="fix single_sidebar">
                                                <h2>Немного обо мне</h2>
                                                <p>блабла балабалаб бла</p>
                                        </div>
                                        <div class="fix single_sidebar">
                                                <h2>Категории</h2>
                                                <a href="/education">Образование(<?= count(application\models\News::getAliasNews(application\models\Keywords::EDUCATION_KEYWORDS_ALIAS))?>)</a>
                                                <a href="/region">Региональные(<?= count(application\models\News::getAliasNews(application\models\Keywords::REGION_KEYWORDS_ALIAS))?>)</a>
                                        </div>
                                </div>
                        </div>


                </div>

                <div class="fix bottom_add_bar">
                        <!--<div class="addbar_leaderborard"><img src="http://placehold.it/728x90"/></div>-->
                </div>

        </div>

        <div class="fix footer_top_area">
        </div>
        <script type="text/javascript">
//                selectnav('nav-top', {
//                  label: '-Navigation-',
//                  nested: true,
//                  indent: '-'
//                });
//
//                selectnav('nav-bottom', {
//                  activeclass: 'act',
//                  label: false,
//                  nested: false,
////                  indent: '_'
//                });
        </script>
</body>
</html>

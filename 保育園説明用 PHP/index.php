<?php

// DB接続

// DB接続
$dbn ='mysql:dbname=gsacs_d03_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．

// SQL作成&実行

// todo_create.php セレクト部分を

// SQL作成&実行

$sql = 'SELECT * FROM kadai_table ORDER BY deadline ASC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
  } else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
      $output .= "
      <li>
        
          {$record["deadline"]}
          {$record["todo"]}
          {$record["iken"]}      
        </li>
      ";
  }
}


// SQL作成&実行
// todo_read.php




?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>子供向け惣菜販売＠保育園</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <!--カーソルつくる-->
        <div class="cursor"></div>
        <div class="follower"></div>
    <!--//カーソルつくる-->
    <script type="text/javascript" src="sample.js"></script>
    <!--header-->
    <header class="l-header">


        <!-- main visual -->


        <div class="p-main-visual">
            <h1 class="p-main-visual__catch-copy">
                子供向け惣菜販売＠保育園
                <span class="p-main-visual__sub-copy">子供達に<span
                        class="u-break-at-mobile">「おいしい記憶をつくりたい。」</span></span>
            </h1>
        </div>      

        <div class="p-header-nav">
            <div class="l-container p-header-nav__inner">
                <p class="p-header-nav__logo"><a href="https://www.kikkoman.com/jp/index.html"><img src="images/header/logo.png"
                            alt="Cheese Academy Tokyo"></a></p>

                <!-- <button class="btn btn-mobileMenu">Menu</button> -->

                <nav class="p-header-nav__navigation">
                    <ul class="p-global-nav">
                        <li class="p-global-nav__item"><a href="#about">About</a></li>
                        <li class="p-global-nav__item"><a href="#course">Concept</a></li>
                        <li class="p-global-nav__item"><a href="#PRODUCT">product</a></li>
                        <li class="p-global-nav__item"><a href="#news">Result</a></li>
                        <li class="p-global-nav__item"><a href="#access">Access</a></li>
                        <li class="p-global-nav__item"><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>


    </header>
    <!--//header-->

    <main>

        <!--about-->
        <section id="about" class="p-section-about">
            <div class="l-container">
                <div class="p-section-about__header">
                    <h2 class="c-section-title c-section-title--color-yellow">
                        About
                        <span class="c-section-title--ja">キッコーマンの新規事業です</span>
                    </h2>
                </div>
                <div class="p-section-about__body">
                    <p class="c-section-paragraph">共働き夫婦の夕ご飯の悩みを解決したい。そんな想いで始めました。</p>
                    <p class="c-section-paragraph">時間に追われて、食事に手が回らない日も、安心して子ども達が美味しく食べられる
                        食事があったらホッとしませんか。</p>
                    <p class="c-section-paragraph">あなたの近くの保育園で子供も大人も食べられる惣菜を販売します。</p>
                    <p class="c-section-paragraph">まずは北海道で実験販売をしますが<br>
                        ノウハウを蓄積して全国販売を目指します。</p>
                
                        <p class="c-section-paragraph">消費者の「食と健康」に関する期待に応え、<br>
                            社会課題の解決に貢献する新規事業です。</p>    </div>
            </div>
            <div class="shouraizou">
                <img src="images/about/kosodate.jpg" alt="この事業の将来像">
            </div>
        </section>                                                                                                                                          
        <!--// about-->

        <!--course-->
        <section id="course" class="p-section-course">
            <div class="l-container p-section-course__header">
                <h2 class="c-section-title">
                    Concept
                    <span class="c-section-title--ja">商品の強いこだわり</span>
                </h2>
                <p class="p-section-course__paragraph c-section-paragraph">
                    忙しくても、ほっとする味を食卓に並べたい。<br class="u-break-at-pc">
                    ひきたてる野菜だしのうまみが特長です。
                </p>
            </div>

            <section id="course01" class="p-section-course__item">
                <div class="p-course-box">
                    <div class="p-course-box__info">
                        <div class="p-course-box__inner">
                            <h3 class="p-course-box__title">化学調味料・保存料・着色料 不使用</h3>
                            <p class="c-section-paragraph">食材の味をいかした優しい味付けと栄養バランスのとれた食事が
                                子ども達の健やかな成長につながります。
                                </p>
                        </div>
                    </div>
                    <div class="p-course-box__img">
                        <img src="images/course/course_01.jpg" alt="チーズアカデミーで使用されている農園">
                    </div>
                </div>
            </section>

            <!--	-->
            <section id="course02" class="p-section-course__item">
                <div class="p-course-box p-course-box--reverse">
                    <div class="p-course-box__info p-course-box__info--reverse">
                        <div class="p-course-box__inner">
                            <h3 class="p-course-box__title">野菜のこだわり</h3>
                            <p class="c-section-paragraph">北海道各地に足を運び、味と品質を確かめたうえで「これだ！」と思う食材を厳選。すべての食材に、生産者様のこだわりが詰まっています。野菜は、歌志内市の契約農家様から直送で仕入れています。水耕栽培で大切に育てられた野菜は新鮮な味わいで、シャキシャキとした歯ごたえがあり、苦みや渋みが感じられません。そのため、野菜嫌いのお子様が多いなか「野菜は子供も喜んで食べてくれる」というお声をたくさんいただいています。
                                また、普段なかなか味わうことのできない希少な野菜も、味わうことができます。
                                </p>
                        </div>
                    </div>
                    <p class="p-course-box__img"><img src="images/product/yasai.jpg" alt="野菜イメージ"></p>
                </div>
            </section>

            <!--	-->
            <section id="course03" class="p-section-course__item">
                <div class="p-course-box">
                    <div class="p-course-box__info">
                        <div class="p-course-box__inner">
                            <h3 class="p-course-box__title">お米のこだわり</h3>
                            <p class="c-section-paragraph">契約農家様の当別産ななつぼしと深川産ゆめぴりかをブレンド。惣菜店自らが精米をしているため、いつでも新鮮な状態で味わっていただけます。
                                白米と玄米の割合は9:1。たっぷり浸水させた玄米のプチプチとした食感が大好評です。
                                </p>
                        </div>
                    </div>
                    <p class="p-course-box__img"><img src="images/course/kme01.jpg" alt="チーズアカデミーでは"></p>
                </div>
            </section>


        </section>
        <!--//course-->


        <!--product-->
        <section id="news" class="p-section-news">
            <div class="p-section-news__header">
                <h2 class="c-section-title c-section-title--color-yellow">
                    product
                    <span class="c-section-title--ja">商品</span>
                </h2>
            </div>
            <span class="strInterval">
            <div class="l-container p-section-news__body">
                <ul class="p-news-list">
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/drykare-mihonn.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">ドライカレー</h3>
                                <p class="c-section-paragraph">500円（税込）</p>
                                <p class="p-news-list__date1">毎日定番</p>

                        

                                
                            </div>
                        </a>    
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/tizuhanba-gu.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">チーズハンバーグ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">月曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/demihanba-gu1.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">デミハンバーグ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">火曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/tomapoku.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">トマトポーク</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">水曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/gyuunikutamanegi.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">牛肉と玉ねぎ炒め</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">木曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/shiretokoumadare1.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">知床鶏の旨たれ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">金曜日</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            </span>
            <div class="l-container p-section-news__body">
                <ul class="p-news-list">
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/kodomoyouki.bmp" alt=""></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title"></h3>
                                <p class="c-section-paragraph"></p>
                                <p class="p-news-list__date"></p>
                            </div>
                        </a>    
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/shiromizakana.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">白身魚フライ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">月曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/shiretokochikinnanban-.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">知床鶏チキン南蛮</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">火曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/hasshubeef.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">ハッシュビーフ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">水曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/sangenton.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">三元豚の甘辛煮</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">木曜日</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="#">
                            <p class="p-news-list__thumb"><img src="images/product/rokomoko.jpg" alt="ドライカレーの画像"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">ロコモコ</h3>
                                <p class="c-section-paragraph">750円（税込）</p>
                                <p class="p-news-list__date">金曜日</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="p-section-news__footer">
            <script type="text/javascript">
                <!--
                
            function keisan(){

                // 設定開始
            
                // 商品1
                var price1 = document.form1.goods1.selectedIndex * 500; // 単価を設定
                document.form1.field1.value = price1; // 小計を表示
            
                // 商品2
                var price2 = document.form1.goods2.selectedIndex * 750; // 単価を設定
                document.form1.field2.value = price2; // 小計を表示
            
                // 商品3
                var price3 = document.form1.goods3.selectedIndex * 750; // 単価を設定
                document.form1.field3.value = price3; // 小計を表示
            
                // 合計を計算
                var total = price1 + price2 + price3;
            
                // 設定終了
            
            
                document.form1.field_total.value = total; // 合計を表示
            
            }
            
            // --> 
            </script> 
            
            </head>
            <div>
            
            <form action="#" name="form1">
            
            <table>
            <tr>
            <th>商品名</th>
            <th>単価</th>
            <th>数量</th>
            <th>金額</th>
            </tr>
            <tr>
            <td>ドライカレー</td>
            <td align="right">500円</td>
            <td><select name="goods1" onChange="keisan()">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select></td>
            <td><input type="text" name="field1" size="8" value="0"> 円</td>
            </tr>
            <tr>
            <td>月 日替わり</td>
            <td align="right">750円</td>
            <td><select name="goods2" onChange="keisan()">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select></td>
            <td><input type="text" name="field2" size="8" value="0"> 円</td>
            </tr>
            <tr>
            <td>火 日替わり</td>
            <td align="right">750円</td>
            <td><select name="goods3" onChange="keisan()">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select></td>
            <td><input type="text" name="field3" size="8" value="0"> 円</td>
            </tr>
            <tr>
            <td align="right" colspan="3"><strong>合計</strong></td>
            <td><input type="text" name="field_total" size="8" value="0"> 円</td>
            </tr>
            </table>
            
            </form>
  

                <a href="https://kato-shoten.jp/#commitment" class="c-button">協力惣菜店の情報を見る（加藤商店）</a>
            </div>



        </section>
        <!--//news-->

        <!--news-->
        <section id="news" class="p-section-news">
            <div class="p-section-news__header">
                <h2 class="c-section-title c-section-title--color-yellow">
                    Result
                    <span class="c-section-title--ja">実績</span>
                </h2>
            </div>

            <div class="l-container p-section-news__body">
                <ul class="p-news-list">
                    <li class="p-news-list__item">
                        <a href="https://kidshouse-ohana.com/?p=685">
                            <p class="p-news-list__thumb"><img src="images/news/chitose1.jpg" alt="キッズハウスオハナ"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">キッズハウスオハナ</h3>
                                <h4 class="p-news-list__title">千歳市</h4>
                                <p class="c-section-paragraph">価格：500円（税込）無人販売
                                    購入率は3割から6割。2～3人に1人が購入 株式会社運営</p>
                                <p class="p-news-list__date">2021.6/7～6/9</p>
                            </div>
                        </a>
                    </li>

                    <li class="p-news-list__item">
                        <a href="http://www.clover25.co.jp/company.html">
                            <p class="p-news-list__thumb"><img src="images/news/gaikai-kitaen.jpg" alt="きずな保育園"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">きずな保育園 3カ所</h3>
                                <h4 class="p-news-list__title">札幌市(北園/新琴似園/麻布園)</h4>
                                <p class="c-section-paragraph">札幌市認可保育園 株式会社運営
                                    園児４０名在籍
                                    グループ３カ所運営 保育士離職率０％</p>
                                <p class="p-news-list__date">2021.8.17 開始</p>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://adventureclubsappo.wixsite.com/adventure-club">
                            <p class="p-news-list__thumb"><img src="images/news/gakudou1.jpg" alt="コミュニティ型学童保育"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">コミュニティ型学童保育</h3>
                                <h4 class="p-news-list__title">札幌市中央区</h4>
                                <p class="c-section-paragraph">札幌市学童保育園 NPO運営
                                    園児平均１５名利用
                                    「なまら つながる」がコンセプト</p>

                                <p class="p-news-list__date">2021.8.12～9.16 </p>
                                <p class="p-news-list__date">毎日２０食 ２５日間販売</p>
                            </div>

                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://run-run.fun/">
                            <p class="p-news-list__thumb"><img src="images/news/runrun.jpg" alt="るんるん保育園"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">(夜間)るんるん保育園</h3>
                                <h4 class="p-news-list__title">札幌市中央区（すすきの）</h4>
                                <p class="c-section-paragraph">預かり１７時～翌７時
                                    園児平均１５名利用
                                    「共にそだちあう」がコンセプト</p>

                                    <p class="p-news-list__date">2021.8.17 開始</p>
                            </div>

                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://www.clh-kk.com/kodomo/sapporo-west/">
                            <p class="p-news-list__thumb"><img src="images/news/sapporo1.jpg" alt="こどもカンパニー"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">こどもカンパニー 4カ所</h3>
                                <h4 class="p-news-list__title">札幌市中央区</h4>
                                <p class="c-section-paragraph">企業提携型保育園 株式会社運営
                                    グループ４カ所２７０名在籍
                                    毎週月曜日 有人実験販売予定</p>
                                <p class="p-news-list__date">2021.8 開始予定→保留</p>

                            </div>
                        </a>
                    </li>   
                </ul>
            </div>
            <div class="l-container p-section-news__body">
                <ul class="p-news-list">
                    <li class="p-news-list__item">
                        <a href="https://kidshouse-ohana.com/?p=685">
                            <p class="p-news-list__thumb"><img src="images/product/chitosekao.jpg"キッズハウスオハナ"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">橿棒 佳奈</h3>
                                <h4 class="p-news-list__title">３０代 株式会社</h4>
  

              
                            </div>
                        </a>
                    </li>

                    <li class="p-news-list__item">
                        <a href="http://www.clover25.co.jp/company.html">
                            <p class="p-news-list__thumb"><img src="images/news/tanaka.jpg" alt="きずな保育園"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">田中 雅代</h3>
                                <h4 class="p-news-list__title">３０代 株式会社</h4>
                            </div>
                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://adventureclubsappo.wixsite.com/adventure-club">
                            <p class="p-news-list__thumb"><img src="images/news/himukai.jpg" alt="コミュニティ型学童保育"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">日向 洋喜</h3>
                                <h4 class="p-news-list__title">２０代 合同会社</h4>
                            </div>

                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://run-run.fun/">
                            <p class="p-news-list__thumb"><img src="images/news/kon.jpg" alt="るんるん保育園"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">近 維子</h3>
                                <h4 class="p-news-list__title">３０代 株式会社</h4>
                            </div>

                        </a>
                    </li>
                    <li class="p-news-list__item">
                        <a href="https://www.clh-kk.com/kodomo/sapporo-west/">
                            <p class="p-news-list__thumb"><img src="images/news/watanabe.jpg" alt="こどもカンパニー"></p>
                            <div class="p-news-list__excerpt">
                                <h3 class="p-news-list__title">渡辺 和寛</h3>
                                <h4 class="p-news-list__title">３０代 株式会社</h4>

                            </div>
                        </a>
                    </li>   
                </ul>
            </div>
            <div class="p-section-news__footer">
                <a href="#" class="c-button">更に実績を見る（工事中）</a>
            </div>
        </section>
        <!--//news-->

        <!--access-->
        <section id="access" class="p-section-access">

            <div class="p-section-access__header">
                <h2 class="c-section-title">
                    Access
                    <span class="c-section-title--ja">会社情報</span>
                </h2>
            </div>

            <div class="p-section-access__maps">
                <iframe class="p-section-access__maps--iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.1296317631254!2d141.3495754146818!3d43.05974107914608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b299cbef0679d%3A0x6804fac231acb49!2z44CSMDYwLTAwNDIg5YyX5rW36YGT5pyt5bmM5biC5Lit5aSu5Yy65aSn6YCa6KW_77yU5LiB55uuIOmBk-mKgOODk-ODq-ODh-OCo-ODs-OCsA!5e0!3m2!1sja!2sjp!4v1627358124966!5m2!1sja!2sjp"
                    width="1366" height="300" style="border:0"></iframe>
            </div>

            <div class="p-section-access__info">
                <div class="p-place-info">
                    <dl class="p-place-info__item">
                        <dt class="p-place-info__title">会社名</dt>
                        <dd class="p-place-info__detail"> キッコーマン食品株式会社北海道支社</dd>
                    </dl>
                    <dl class="p-place-info__item">

                        <dt class="p-place-info__title">事務所所在地</dt>
                        <dd class="p-place-info__detail">〒060-0042 札幌市中央区大通西4-1道銀ビル10階</dd>
                    </dl>
                    <dl class="p-place-info__item">

                        <dt class="p-place-info__title">TEL</dt>
                        <dd class="p-place-info__detail"><a href="tel:0112611291">011-261-1291</a></dd>
                    </dl>
                    <dl class="p-place-info__item">

                        <dt class="p-place-info__title">FAX</dt>
                        <dd class="p-place-info__detail">011-241-3187</dd>
                    </dl>
                    <dl class="p-place-info__item">

                        <dt class="p-place-info__title">MAIL</dt>
                        <dd class="p-place-info__detail"><a
                                href="mailto:ykanai@mail.kikkoman.co.jp">ykanai@mail.kikkoman.co.jp</a></dd>
                    </dl>
                </div>
            </div>
        </section>
        <!--//access-->
        <!--map-->
        
        <body>
            <h1>位置情報取得&Map表示</h1>
            <div id="map"></div>
          
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src='https://www.bing.com/api/maps/mapcontrol?key=AifEjrIu_gIcZngE1MqWxgXUNZgcuEwNmkmUlR1K2s-NAJL5GhqkFQjR885S-1He' async defer></script>
            <script>
          
          <script src='sample.js'></script>
          
        <style>
            html,
            body {
              height: 100%;
              margin: 0;
              padding: 0;
            }
        
            #map {
              height: calc(100% - 102px);
              margin: 0;
              padding: 0;
            }
            
</style>
</head>
<body>
<h1>Directions Input Panel</h1>
<!-- MAP[START] -->

<div class="directionsContainer">
    <div id="directionsPanel"></div>
    <div id="directionsItinerary"></div>
</div>
<div id="myMap"></div>
<!-- MAP[END] -->

<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AifEjrIu_gIcZngE1MqWxgXUNZgcuEwNmkmUlR1K2s-NAJL5GhqkFQjR885S-1He' async defer></script>
<script>
let map,directionsManager;
function GetMap() {
    map = new Microsoft.Maps.Map('#myMap', {
        center: new Microsoft.Maps.Location(47.6149, -122.1941),
        zoom: 15,
        mapTypeId: Microsoft.Maps.MapTypeId.aerial
    });
    //Load the directions module.
    Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
        //Create an instance of the directions manager.
        directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

        //Specify where to display the route instructions.
        directionsManager.setRenderOptions({itineraryContainer: '#directionsItinerary'});

        //Specify the where to display the input panel
        directionsManager.showInputPanel('directionsPanel');
    });
}
</script>
</body>
</html>
        <!--//map-->
        <!--contact-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <section id="contact" class="p-section-contact">
            <div class="l-container">
                <div class="p-section-contact__header">
                    <h2 class="c-section-title">
                        Contact
                        <span class="c-section-title--ja">新規「惣菜販売」お申し込み・お問い合わせ</span>
                        <span class="c-section-title--ja">ぜひ1度、自保育園で惣菜販売をしませんか。説明会は随時開催中。</span>
                        <span class="c-section-title--ja">その他、お問い合わせもお気軽にどうぞ。お待ちしております。</span>
                    </h2>

                </div>



                <div class="p-section-contact__body">
                    <form action="#" class="c-form">
                        <class="c-form__list">
                            <li class="c-form__item">
                                <label for="name" class="c-form__label">名前</label>
                                <input type="text" name="name" id="name" class="c-form__input-field">
                            </li>
                            <li class="c-form__item">
                                <label for="kana" class="c-form__label">カナ</label>
                                <input type="text" name="kana" id="kana" class="c-form__input-field">
                            </li>
                            <li class="c-form__item">
                                <label for="email" class="c-form__label">e-mail</label>
                                <input type="text" name="email" id="email" class="c-form__input-field">
                            </li>
                            <li class="c-form__item c-form__item__multiple-field">
                                <span class="c-form__label">問い合わせ</span>

                                <ul class="c-form-radio">
                                    <li class="c-form-radio__item"><label for="company"><input type="radio"
                                                name="reason" id="company" class="c-form__radio-field"><span
                                                class="c-form__radio-label">惣菜販売をしたい</span></label></li>
                                    <li class="c-form-radio__item"><label for="jobchange"><input type="radio"
                                                name="reason" id="jobchange" class="c-form__radio-field"><span
                                                class="c-form__radio-label">資料請求</span></label></li>
                                    <li class="c-form-radio__item"><label for="stepup"><input type="radio" name="reason"
                                                id="stepup" class="c-form__radio-field"><span
                                                class="c-form__radio-label">説明会に参加したい</span></label></li>
                                    <li class="c-form-radio__item"><label for="knowledge"><input type="radio"
                                                name="reason" id="knowledge" class="c-form__radio-field"><span
                                                class="c-form__radio-label">保育園に惣菜を納品したい</span></label></li>
                                </ul>
                            </li>
                            <li class="c-form__item c-form__item__multiple-field">
                                <label for="detail" class="c-form__label c-form__label--textarea">詳細</label>

                                <textarea name="detail" id="detail" cols="30" rows="10"
                                    class="c-form__input-field c-form__input-field__textarea"></textarea>
                            </li>
                            <div class="c-form__submit-field">
                                <button class="c-button" id="save">SAVE</button><button class="c-button" id="clear">CLEAR</button>
                            </div>                  
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <script>
                          
                              //1.Save クリックイベント
                              $('#save').on('click', function () {
                            //ローカルストレージにmemoという名前でデータ保存
                                const text = $('#detail').val();
                            localStorage.setItem('memo', text);
                          });                        

    //2.clear クリックイベント
    $('#clear').on('click', function () {
        //ローカルストレージにmemoという名前でデータ削除
  localStorage.removeItem('memo');
    //text_areaを空文字で上書きする
  $('#detail').val('');
});

    //3.ページ読み込み：保存データ取得表示
    if (localStorage.getItem('memo')) {
        //ローカルストレージにmemoという名前でデータ取得
  const text = localStorage.getItem('memo');
      //text_areaをデータで上書きする
  $('#detail').val(text);
}

  </script>

                        </ul>

                        <div class="c-form__submit-field">
                            <button class="c-button">送信</button>
                        </div>
                        <script type="text/javascript">
                            function check(){
                              if (mail_form.mail.value == ""){
                            //条件に一致する場合(メールアドレスが空の場合)
                              alert("メールアドレスを入力してください");    //エラーメッセージを出力
                             return false;    //送信ボタン本来の動作をキャンセルします
                              }else{
                              //条件に一致しない場合(メールアドレスが入力されている場合)
                             return true;    //送信ボタン本来の動作を実行します
                             }
                            }
                            </script>
                    </form>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script>







                      //1.Save クリックイベント
                  $('#c-button').on('click', function () {
                    const data = {
                    title: $('#input').val(),
                    text: $('#text_area').val(),
                    };
                   const jsonData = JSON.stringify(data);
                   localStorage.setItem('memo', jsonData);
                  });
                  
                  
                  
                      //2.clear クリックイベント
                  
                      $('#clear').on('click', function () {
                    localStorage.removeItem('memo');
                    $('#text_area').val('');
                  });
                  
                      //3.ページ読み込み：保存データ取得表示
                      if (localStorage.getItem('memo')) {
                         const jsonText = localStorage.getItem('memo');
                         const text = JSON.parse(jsonText);
                    $('#input').val(text.title);
                    $('#text_area').val(text.text);
                  }
                  
                    </script>


    





        <!--// contact-->
    </main>

 
    
    <body>


        <section id="contact" class="p-section-contact">
            <div class="l-container">
                <div class="p-section-contact__header">
                    <h2 class="c-section-title">
                       ご意見掲示板
                        <span class="c-section-title--ja">商品に対するご意見（ご意見・不満点）</span>
                        <span class="c-section-title--ja">惣菜に関する率直なご意見をお願いします。</span>
                    </h2>


                </div>

      <!-- 入力場所を作成しよう -->
      
      <div class="p-section-contact__body">
      <form action="todo_create.php" method="POST">
        <fieldset>
          <legend>ご意見掲示板</legend>
          <div>
          名前 <input type="text" name="todo">
          </div>
          本日の日付 <input type="date" name="deadline">
          <div>
            ご意見<input type="text" name="iken">
          </div>
          <div>
            <button id="send">送信</button>
          </div>
        </fieldset>
      </form>
      <!-- データ出力場所 -->
      <ul id="output"><?=$output ?></ul>
    
    
    </body>
    
    </html>

    <!--footer-->
    <footer class="l-footer">
        <div class="">
            <small class="l-footer__copyrights">copyrights 2021 Kikkoman K2 project All RIghts Reserved.
            </small>
        </div>
    </footer>
    <!--// footer-->



</body>

</html>


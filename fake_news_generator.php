<?php
    require_once "config.php";    

    $text ="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.";

    for ($x = 0; $x <= 10; $x++) {
    
    $title = rand(1,100)."خبر شماره";
    $news_author = array(
        'مسئول پایه', 'معاونت پروشی', 'معاونت آموزشی', 'مدیریت مدرسه',
    );
    $news_category = array(
        'دسته اول', 'دسته دوم
    );
		
        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $options = [
            
            
          PDO::ATTR_EMULATE_PREPARES   => false,
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
          $pdo = new PDO($dsn, $db_user, $db_password, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('');
        }
        $stmt = $pdo->prepare("INSERT INTO sch_news (news_title, news_body, news_author, news_category) VALUES (?,?,?)"); 
        if($stmt->execute([ $title, $text, $news_author, $news_category ])) {
                $stmt = null;

        echo "The number is: $x <br>";
            } else{
                echo "مشکلی پیش آمده";
            }
}
?>
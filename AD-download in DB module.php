<?php  

   // Парамы для подключения
    $db_host = "localhost"; 
    $db_user = "linguamaster24"; // Логин БД
    $db_password = "7V9g1T2o"; // Пароль БД
    $db_base = 'traslates'; // Имя БД
   // $db_table = "Message4"; // Имя Таблицы БД
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

if (!$mysqli) {
    echo  'ошибка:' . mysqli_connect_errno() ;
    exit;
  }

    

?>

<form method="POST" action=""><!-- ОСНОВНАЯ ФОРМА -->

<select name = "translationType">
  <option>Письменные переводы</option>
  <option>Последовательный перевод</option>
</select>

 <select name = "languageOne">
  <option>Английский</option>
  <option>Арабский</option>
  <option>Армянский</option>
  <!-- <option>Белорусский</option> -->
  <option>Болгарский</option>
  <option>Венгерский</option>
  <option>Вьетнамский</option>
  <option>Греческий</option>
  <option>Грузинский</option>
  <!-- <option>Датский</option> -->
  <option>Иврит</option>
  <!-- <option>Идиш</option> -->
  <option>Индонезийский</option>
  <option>Испанский</option>
  <option>Итальянский</option>
  <option>Казахский</option>
  <option>Каталанский</option>
  <option>Китайский</option>
  <option>Корейский</option>
  <option>Латышский</option>
  <option>Литовский</option>
  <option>Мальтийский</option>
  <option>Молдавский</option>
  <option>Монгольский</option>
  <option>Немецкий</option>
  <option>Нидерландский</option>
  <option>Норвежский</option>
  <option>Персидский</option>
  <option>Польский</option>
  <option>Португальский</option>
  <option>Румынский</option>
  <option>Русский</option>
  <option>Сербский</option>
  <option>Словацкий</option>
  <option>Словенский</option>
  <option>Тибетский</option>
  <option>Турецкий</option>
  <option>Узбекский</option>
  <option>Украинский</option>
  <option>Урду</option>
  <option>Финский</option>
  <option>Французский</option>
  <option>Хинди</option>
  <option>Чешский</option>
  <option>Шведский</option>
  <option>Эстонский</option>
  <option>Японский</option>
</select>

<select name = "languageTwo">
  <option>Английский</option>
  <option>Арабский</option>
  <option>Армянский</option>
  <!-- <option>Белорусский</option> -->
  <option>Болгарский</option>
  <option>Венгерский</option>
  <option>Вьетнамский</option>
  <option>Греческий</option>
  <option>Грузинский</option>
  <!-- <option>Датский</option> -->
  <option>Иврит</option>
  <!-- <option>Идиш</option> -->
  <option>Индонезийский</option>
  <option>Испанский</option>
  <option>Итальянский</option>
  <option>Казахский</option>
  <option>Каталанский</option>
  <option>Китайский</option>
  <option>Корейский</option>
  <option>Латышский</option>
  <option>Литовский</option>
  <option>Мальтийский</option>
  <option>Молдавский</option>
  <option>Монгольский</option>
  <option>Немецкий</option>
  <option>Нидерландский</option>
  <option>Норвежский</option>
  <option>Персидский</option>
  <option>Польский</option>
  <option>Португальский</option>
  <option>Румынский</option>
  <option>Русский</option>
  <option>Сербский</option>
  <option>Словацкий</option>
  <option>Словенский</option>
  <option>Тибетский</option>
  <option>Турецкий</option>
  <option>Узбекский</option>
  <option>Украинский</option>
  <option>Урду</option>
  <option>Финский</option>
  <option>Французский</option>
  <option>Хинди</option>
  <option>Чешский</option>
  <option>Шведский</option>
  <option>Эстонский</option>
  <option>Японский</option>
</select>



 <br><input name="tabtext" style ="" value="" type="text" placeholder="Поменять"/>
 <input type="submit" name="submit2" value="Узнать текущую цену"/><br><br>


<?php 
$translation = $_POST['translationType']; 
$languageFirst = $_POST['languageOne']; 
$languageSecond = $_POST['languageTwo'];
$tabtext = $_POST['tabtext'];
$name2 = $_POST['submit2'];
?>

<input type="submit" name="submit" value="Изменить цену"/> <br> <!-- Кнопка добваления в бд -->

<?php 

 if(isset($_POST['submit2'])){
  $sqlTranslation = mysqli_query($mysqli,"SELECT * FROM `Activity` WHERE `name` = '".$translation."' ");//Запрос для типа переводов

    while ($translationResult = mysqli_fetch_array($sqlTranslation)) {
          $translationMatrix = $translationResult['id'];
        }

    if (!$sqlTranslation) {
      echo 'False';
    }

$sqlFirst = mysqli_query($mysqli, "SELECT * FROM `Language` WHERE `title` = '".$languageFirst."' " ); //Запрос для первого Select 

    while ($firstResult = mysqli_fetch_array($sqlFirst)) {
        $helpMeFirst = $firstResult['id'];
        
      }

  if (!$sqlFirst) {
    echo 'False';
  }


$sqlSecond = mysqli_query($mysqli, "SELECT * FROM `Language` WHERE `title` = '".$languageSecond."' " ); //Запрос для второго Select 

    while ($secondResult = mysqli_fetch_array($sqlSecond)) {
        $helpMeTwo = $secondResult['id'];
      }

  if (!$sqlSecond) {
    echo 'False';
  } 


      $sqlEnd2 = mysqli_query($mysqli,"SELECT * FROM ActivityMatrix WHERE lng_from = '".$helpMeFirst."' AND lng_to = '".$helpMeTwo."' AND activity = '".$translationMatrix."' " );

      while ($test2 = mysqli_fetch_array($sqlEnd2)) {
          echo "<pre>";
           echo "Текущая цена: " . $test2[5];
           $drakon = $test2['price'];
            echo "<pre>";
           // var_dump($test2);
           // $helpMeTwo = $secondResult['id'];
          }
      
}

// UPDATE ДОБАВЛЕНИЕ В БД (НЕ ЗАКОНЧЕНО)
    if(isset($_POST['submit']) && isset($_POST['translationType']) && isset($_POST['languageOne']) && isset($_POST['languageTwo'])){

        if(($firstResult == $firstMatrixResult) && ($secondResult == $secondMatrixResult) && ($translationResult == $TranslationCompareResult )){

            if($_POST['tabtext'] == "") {
              echo "Поле ввода цены пустое!";
            } else {

$sqlTranslation = mysqli_query($mysqli,"SELECT * FROM `Activity` WHERE `name` = '".$translation."' ");//Запрос для типа переводов

    while ($translationResult = mysqli_fetch_array($sqlTranslation)) {
          $translationMatrix = $translationResult['id'];
        }

    if (!$sqlTranslation) {
      echo 'False';
    }

$sqlFirst = mysqli_query($mysqli, "SELECT * FROM `Language` WHERE `title` = '".$languageFirst."' " ); //Запрос для первого Select 

    while ($firstResult = mysqli_fetch_array($sqlFirst)) {
        $helpMeFirst = $firstResult['id'];
        
      }

  if (!$sqlFirst) {
    echo 'False';
  }


$sqlSecond = mysqli_query($mysqli, "SELECT * FROM `Language` WHERE `title` = '".$languageSecond."' " ); //Запрос для второго Select 

    while ($secondResult = mysqli_fetch_array($sqlSecond)) {
        $helpMeTwo = $secondResult['id'];
      }

  if (!$sqlSecond) {
    echo 'False';
  } 

         // $sqlEnd = mysqli_query($mysqli,"UPDATE ActivityMatrix SET price WHERE lng_from = '.$helpMeFirst.' AND lng_to = '.$helpMeTwo.' AND activit = '.$translationMatrix.'");



  $sqlEnter = mysqli_query($mysqli, "UPDATE ActivityMatrix SET price = '".$tabtext."' WHERE lng_from = '".$helpMeFirst."' AND lng_to = '".$helpMeTwo."' AND activity = '".$translationMatrix."' " );


  $sqlEnd = mysqli_query($mysqli,"SELECT * FROM ActivityMatrix WHERE lng_from = '".$helpMeFirst."' AND lng_to = '".$helpMeTwo."' AND activity = '".$translationMatrix."' " );

  while ($test = mysqli_fetch_array($sqlEnd)) {
      echo "<pre>";
       echo "Вы успешно изменили цену на: " . $test[5];
       $drakon = $test['price'];
        
       // $helpMeTwo = $secondResult['id'];
      }
  if (!$sqlSecond) {
    echo 'False';
  } 

 

          // echo "<p>12345678979465</p>";
            //while ($endResult = mysqli_fetch_array($sqlEnd)) {
            //      // echo '<pre>';
            //      // echo($endResult[]);
            //     }isset(
          }
        }
    }// else {echo "end error";}
    //  echo $translationMatrix;
    //  echo "<br>";
    // echo $helpMeFirst;
    //  echo "<br>";
    //  echo $helpMeTwo;

      
?>

<br>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {

    var name_tovar = localStorage.getItem("name_product");
    var name_tovar2 = localStorage.getItem("name_product2");
    $("body > form > select:nth-child(2) option:selected").prop(name_tovar, true);
    $("body > form > select:nth-child(3) option:selected").val(name_tovar2).change();

$("body > form > input[type=submit]:nth-child(9)").on("click",function(){
    var noup = $("body > form > select:nth-child(2) option:selected").text();
    var noup2 = $("body > form > select:nth-child(3) option:selected").text();

    var name_product = noup;
    localStorage.setItem("name_product",name_product);
    console.log(name_product);

    var name_product2 = noup2;
    localStorage.setItem("name_product2",name_product2);
    console.log(name_product2);

if(noup === noup2){
 alert("Вы выбрали одинаковые языки!");
}})
  });
</script>
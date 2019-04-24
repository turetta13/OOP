<?php
session_start();
?>
<?php
$users = [['login' => 'Vasisualiy', 'password' => '12345', 'lang' => 'ru'],
    ['login' => 'Afanasiy', 'password' => '54321', 'lang' => 'en'],
    ['login' => 'Petro', 'password' => 'EkUC42nzmu', 'lang' => 'ua'],
    ['login' => 'Pedrolus', 'password' => 'Cogito_ergo_sum', 'lang' => 'it'],
    ['login' => 'Sasha', 'password' => 'Alea_est_jacta']];
?>
    <html>
    <body>
    <form method="POST">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" value="login" name="">
    </form>
    </body>
    </html>

<?php

// класс USERS!
class Users
{
    public $login;
    public $password;
    public $lang;

    public function __construct($login, $password, $lang)
    {
        $this->login = $login;
        $this->password = $password;
        $this->lang = $lang;
    }

    public function getUser()
    {
        return "{$this->login} ваш язык {$this->lang}";
    }
}

// класс TRANS!
class Trans
{
    public $language;

    public function __construct()
    {
        $this->language = ['ua' => 'Привiт', 'ru' => 'Привет', 'en' => 'Hello', 'it' => 'Ciao'];
    }

    public function getLang()
    {
        return $this->language;
    }
}

// Создание юзера!
foreach ($users as $key => $value) {
    if ($_POST['login'] == $value['login'] && $_POST['password'] == $value['password']) {
        $users1 = new Users($_POST['login'], $_POST['password'], $value['lang']);
        $trans = new Trans($value['lang']);
        $_SESSION['user'] = $key;
        break;
    }
}
//вывод юзера
if ($_SESSION['user'] == $key && $value['lang'] == true) {
    echo $trans->language[$value['lang']] . ' ' . $users1->getUser();
} else {
    if (isset($_POST['login']) && $value['lang'] == true) {
        echo "неверный логин или пароль";
    }
}


// вариант если язык не определен! Но пока не работает!!
if ($value['lang'] == null) {
    $users2 = new Users ($_POST['login'], $_POST['password'], $_POST['lang']);
    $_SESSION['user'] = $key;
    echo $value['login'] . " выберите язык на котром вам удобно общаться ru, ua, it, en";
    echo ' <form method="POST">
    <input type="text" name="lang">
    <input type="submit" value="ok" name="">
     </form> ';
    $trans2 = new Trans ($_POST['lang']);
    echo $trans2->language[$_POST['lang']] . ' ' . $users2->getUser();
}
?>
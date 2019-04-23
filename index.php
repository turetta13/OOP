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
        <input type="text" name="lang">
        <input type="submit" value="login" name="">
        <a href="lang.php">вперед</a>
    </form>
    </body>
    </html>

<?php

class Users
{
    public $login;
    public $password;
    public $lang;

    public function __construct($login, $password, $lang = 'ru')
    {
        $this->login = $login;
        $this->password = $password;
        $this->lang = $lang;
    }

    public function getUser()
    {
        return "{$this->login} говорит на языке {$this->lang}";
    }
}

$users1 = new Users($_POST['login'], $_POST['password'], $_POST['lang']);


foreach ($users as $value) {
    if ($users1->login == $value['login'] && $users1->password == $value['password']) {
        $_SESSION['user'] = $value;
        echo $users1->getUser();
    }
}

?>
<?php
session_start();
$word='`'.$_GET['word'].'`';
if ($word!='``')
{
setcookie( "wordCookie", $word, strtotime( '+30 days' )); 
$_SESSION['word']= $_GET['word']; 
echo 'session='.$_SESSION['word'].'<br>';
echo 'cookie= ';
print_r ($_COOKIE['wordCookie']);
$page = file_get_contents ( 'http://localhost/book-master/book-master/main.php' );
$preg=preg_match_all($word,$page,$matches);
echo 'Количество найденных слов: ', $preg, '<br />';
print_r ($matches); 
echo '<pre>';
echo '</pre>';
echo 'oldUrl='.$_SESSION['oldUrl'];
$oldUrl=$_SESSION['oldUrl'];
$location='http://localhost'.$oldUrl;
header ("Location: $location");
}
if ($word=='``')
    {header ("Location: main1.php");}
<?php

//echo "$tireqty";
//echo "$oilqty";
 
  require ('page_6.inc');
  
  
    
  class OrderformPage extends Page
  {
    var $row2buttons = array( 'Re-engineering' => 'orderform_6.php',
                              'Standards Compliance' => 'orderform_6.php',
                              'Buzzword Compliance' => 'buzzword.php', 
                              'Mission Statements' => 'mission.php'
                            );
// var $tireqty ;
// var $oilqty ;
// var $sparkqty ;
// var $address ;
    

    function Display_1($tireqty)
    {

      //$this->tireqty=$tireqty ;

      //echo $this->tireqty;

        echo $tireqty; }


    
    function Display($nick, $fio, $email, $passwd)
    {
      echo "<html>\n<head>\n";
      $this -> DisplayTitle();
      $this -> DisplayKeywords();
      $this -> DisplayStyles();
      echo "</head>\n<body>\n";
      $this -> DisplayHeader();
      $this -> DisplayMenu($this->buttons);
      $this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont > <? echo $this->zakaz($nick, $fio, $email, $passwd); ?> </td></table> <?


      $this -> DisplayFooter();
      //echo "</body>\n</html>\n";
    }





function Display_2()
    {?> <table width=100% height=100% border=1><tr>
    <td class=cont> �� ��� ���� ����� ����������! </td><tr>
    <td class=cont > <? echo $this->content; ?> </td></table> <? }



function zakaz($nick, $fio, $email, $passwd)
{

// <?php

  // ������� �������� ����� ����������
  //$tireqty = $HTTP_POST_VARS['tireqty'];
  //$oilqty = $HTTP_POST_VARS['oilqty'];
  //$sparkqty = $HTTP_POST_VARS['sparkqty'];
  //$address = $HTTP_POST_VARS['address'];
  //$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];




//������������ � ���� ������

$hostname="localhost";
$user="root";
$password="root";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
//echo "<br> �� ���� ����������� � �������� ���� ������ <br>";
exit();
}
//echo "<br> C����������� � �������� ���� ������ ������ ������� <br>";


if (!mysql_select_db($db, $link))
{ 
//echo "<br> �� ���� ������� ���� ������<br>";
exit();
}
else
{
//echo "<br> ����� ���� ������ ������ ������� <br>";
}



if ($nick!="" and $passwd!="" and $email!="" and $fio!="") 

{
$query="insert into info (nick, password, email, fio) values ('$nick', '$passwd','$email','$fio')";
$result=mysql_query ($query); 

$outputstring = ������������."\t".$fio." ������ ���������������� ��� �� ����� http://kvtit-kirsute.org.ru � ������� \t".$nick." � ������� \t"
                  .$passwd." \n";


echo $outputstring;


} else {

$services = new OrderformPage();
$content ='
<form action="processorder_6_2.php" method=POST>
<table width=60% align=center bgcolor="white">
<tr><td>&nbsp;
<tr><td><b>�����:</b><td><input type="text" name="nick" size=40>
<tr><td><b>���:</b><td><input type="text" name="fio" size=40>
<tr><td><b>e-mail:</b><td><input type="text" name="email" size=40>
<tr><td><b>������:</b><td><input type="text" name="passwd" size=40>
<tr><td><b>������������� ������:</b><td><input type="text" name="passwdreturn" size=40>
<tr><td colspan=2 align=center>&nbsp;<br><input type="submit" value="Submit"></table>
</form>
';

$services -> SetContent($content);

$services -> Display_2();}




?>
<br>
<br>
<a href="vieworders_password_6.php"> ��������� ��������� ��� ��������� ����� ������� </a> <?}}




$services = new OrderformPage();
$content ='cddc';


$services -> SetContent($content);

$services -> SetTitle('������������ ������ �� ����: ��� �� ���');
$services -> Setnazvanie('������������ ������ �� ����� ���������� �������� ���������� � ����� ���������� ����������� PHP � MySQL <br> �������� ������ ��-83: ������� ������� ������������� <br> ��������: �.�.�. ���. ������� �.�.');


//$services -> Display_1($tireqty);
 
 $services -> Display($nick, $fio, $email, $passwd);

// $services -> zakaz($tireqty, $oilqty, $sparkqty, $address, $DOCUMENT_ROOT, $fio);




?>









<?php 
  require ('page_6.inc');
  
  class OrderformPage extends Page
  {
    var $row2buttons = array( 'Re-engineering' => 'reengineering.php',
                              'Standards Compliance' => 'standards.php',
                              'Buzzword Compliance' => 'buzzword.php', 
                              'Mission Statements' => 'mission.php'
                            );
    function Display()
    {
      echo "<html>\n<head>\n";
      $this -> DisplayTitle();
      $this -> DisplayKeywords();
      $this -> DisplayStyles();
      echo "</head>\n<body>\n";
      $this -> DisplayHeader();
      $this -> DisplayMenu($this->buttons);
      $this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont > <? echo $this->content; ?> </td></table> <?

//      echo $this->content;
      $this -> DisplayFooter();
      echo "</body>\n</html>\n";
    }
  }

  $services = new OrderformPage();
  $content ='
<table width=100%>
<td align=center>����������� ��������� �� ����� </td>
</table>

<form action="processorder_6_2.php" method=POST>
<table width=60% align=center bgcolor="white">
<tr><td><b>�����:</b><td><input type="text" name="nick" size=40>
<tr><td><b>���:</b><td><input type="text" name="fio" size=40>
<tr><td><b>e-mail:</b><td><input type="text" name="email" size=40>
<tr><td><b>������:</b><td><input type="text" name="passwd" size=40>
<tr><td><b>������������� ������:</b><td><input type="text" name="passwdreturn" size=40>
<tr><td colspan=2 align=center>&nbsp;<br><input type="submit" value="Submit"></table>


</form>



';

  
  $services -> SetContent($content);

$services -> SetTitle('������������ ������ �� ����: ��� �� ���');
$services -> Setnazvanie('������������ ������ �� ����� ���������� �������� ���������� � ����� ���������� ����������� PHP � MySQL <br> �������� ������ ��-83: ������� ������� ������������� <br> ��������: �.�.�. ���. ������� �.�.');


  $services -> Display();













?>







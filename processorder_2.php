<?php
require('header.inc');
?>

<?php
  // ������� �������� ����� ����������
  $tireqty = $HTTP_POST_VARS['tireqty'];
  $oilqty = $HTTP_POST_VARS['oilqty'];
  $sparkqty = $HTTP_POST_VARS['sparkqty'];
  $address = $HTTP_POST_VARS['address'];
  
  $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>������������ �� ���� - ���������� ������</title>
</head>
<body>
<h1>������������ ������ � 2 �� ���� ���������� � ������������� ������ ����������� ��������� ������</h1>
<h2>������������ �� ����</h2>
<h3>���������� ������</h3>

<?php 
  $totalqty = 0;
  $totalqty += $tireqty;
  $totalqty += $oilqty;
  $totalqty += $sparkqty;
  
  $totalamount = 0.00;
 
  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $date = date('H:i, jS F');
 
  echo '<p>����� ��������� � ';
  echo $date;
  echo '<br />';
  echo '<p>������ ������ ������:';
  echo '<br />';

  if( $totalqty == 0 )
  {
    echo '�� ������ �� �������� �� ���������� ��������!<br />';
  }
  else
  {
    if ( $tireqty>0 )
      echo $tireqty.' ������������<br />';
    if ( $oilqty>0 )
      echo $oilqty.' ������� � ������<br />';
    if ( $sparkqty>0 )
      echo $sparkqty.' ������ ���������<br />';
  }

  $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE; 
  $total=number_format($total, 2, '.', ' ');
 
  echo '<P>����� �� ������: '.$total.'</p>';

  echo '<P>��� �������: '.$fio.'</p>';
  
  echo '<P>����� ��������: '.$address.'<br />';

  $outputstring = $date."\t".$tireqty." ������������ \t".$oilqty." �����\t"
                  .$sparkqty." ������\t\$".$total
                  ."\t ����� �������� ������\t ". $address."\t ��� �������:".$fio." \n";

  // ������� ���� ��� ����������
  $fp = fopen("orders.txt", 'a');

  flock($fp, LOCK_EX); 
 
  if (!$fp)
  {
    echo '<p><strong>� ��������� ������ ��� ������ �� ����� ���� ���������.  '
         .'����������, ����������� �����.</strong></p></body></html>';
    exit;
  } 

  fwrite($fp, $outputstring);
  flock($fp, LOCK_UN); 
  fclose($fp);

  echo '<p>����� ��������.</p>'; 

?>

<a href="vieworders_2.php"> ��������� ��������� ��� ��������� ����� ������� </a>


</body>
</html>







<?php
require('footer.inc');
?>
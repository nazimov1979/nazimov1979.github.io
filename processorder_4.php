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

<h1>������������ ������ � 4 �� ���� ���������� � ������������� ������ ����������� ������������� �������� � ��������� ������</h1>
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

$products=array("$date", "$tireqty", "$oilqty", "$sparkqty","$total", "$address", "$fio");

//echo "$products[0] <br>";
//echo "$products[1] <br>";
//echo "$products[2] <br>";
//echo "$products[3] <br>";
//echo "$products[4] <br>";
//echo "$products[5] <br>";
//echo "$products[6] <br>";

  $outputstring = $products[0]."\t".$products[1]." ������������ \t".$products[2]." �����\t"
                  .$products[3]." ������\t\$".$products[4]
                  ."\t ����� �������� ������\t ". $products[5]."\t ��� �������:\t".$products[6]." \n";



// ������� ���� ��� ����������
  $fp = fopen("orders_4.txt", 'a');

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

<a href="vieworders_4.php"> ��������� ��������� ��� ��������� ����� ������� </a>


</body>
</html>

<?php
require('footer.inc');
?>
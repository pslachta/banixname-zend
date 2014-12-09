<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleController
 *
 * @author banix
 */
class ArticleController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		echo "Article - index()";
	}

	public function viewAction($id = 21) {
		echo "Article - view($id)";
		echo "<tr><td align=\"center\"><h3>V?chod slunce</h3></td></tr><tr><td align=\"left\">Koncem zimy 00/01 jsme si za?li s k?mo?em na vrchol Ropice. R?no n?s p?ekvapilo hodn? dobr?mi ml?n?mi ?kazy. K?mo? to sv?m nikonem vyfotil a te? se na to m??ete taky kouknout. </td></tr><tr><td align=\"center\"><a href=\"javascript:closeWindow();openWindow1('/picone.php?id=144&dire=ropice',416,324)\"><img src=\"/clanky/ropice/thumb/dawnic.jpg\" border=\"0\" alt=\"Slunce nad mo?em\"></a> <a href=\"javascript:closeWindow();openWindow1('/picone.php?id=145&dire=ropice',416,328)\"><img src=\"/clanky/ropice/thumb/dawn2ic.jpg\" border=\"0\" alt=\"V?chod\"></a> <a href=\"javascript:closeWindow();openWindow1('/picone.php?id=146&dire=ropice',466,362)\"><img src=\"/clanky/ropice/thumb/moreic.jpg\" border=\"0\" alt=\"Mlhopad\"></a> <a href=\"javascript:closeWindow();openWindow1('/picone.php?id=147&dire=ropice',375,610)\"><img src=\"/clanky/ropice/thumb/woodic.jpg\" border=\"0\" alt=\"Temn? les\"></a> </td></tr><tr><td align=\"right\"><a href=\"mailto:banix@centrum.cz\">-b-n-x-</a></td></tr>";
	}

	/*
	 * Old solution
	 * 
	  if(!$id) $id=$_GET['id'];
	  $conn=mysql_connect($dbhost,$dbuser,$dbpass);
	  mysql_select_db($dbname);
	  $sqls="select nazev,txt,autor.autor,autor.email,dire,kat from clanky left join autor on clanky.autor=autor.uid where clanky.id=$id";
	  $result=mysql_query($sqls,$conn);
	  $pole=mysql_fetch_row($result);
	  $nazev=$pole[0];
	  $txt=$pole[1];
	  $autor=$pole[2];
	  $email=$pole[3];
	  $dire=$pole[4];
	  $kategory=$pole[5];

	  echo "<tr><td align='center'><h3>$nazev</h3></td></tr>";
	  echo "<tr><td align='left'>$txt</td></tr>";
	  $sqls="select id,img,thumb,popisek from obr where clanid=$id";
	  $result=mysql_query($sqls,$conn);
	  echo "<tr><td align='center'>";
	  while($pole=mysql_fetch_row($result))
	  {
	  $id=$pole[0];
	  $imgs="$HOME/clanky/".$dire."/".$pole[1];
	  $thumb="$HOME/clanky/".$dire."/thumb/".$pole[2];
	  $popisek=$pole[3];
	  echo imgwin("$HOME/picone.php?id=$id&dire=$dire",$imgs,$thumb,$popisek)." ";
	  }
	  mysql_close($conn);
	  echo "</td></tr>
	  <tr><td align='right'><a href='mailto:$email'>$autor</a></td></tr>";
	  ?>
	 */
}

<html>
<head><meta = charset="UTF-8"></head>
<body>
<?php
header('Location:main_shop.php');
include('phpqrcode/qrlib.php'); 
session_start();
/**
 * @package   fisharebest/algorithm
 * @author    Greg Roach <greg@subaqua.co.uk>
 * @copyright (c) 2015 Greg Roach <greg@subaqua.co.uk>
 * @license   GPL-3.0+
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * Class Dijkstra - Use Dijkstra's algorithm to calculate the shortest path
 * through a weighted, directed graph.
 */
class Dijkstra {
	/** @var integer[][] The graph, where $graph[node1][node2]=cost */
	protected $graph;
	/** @var integer[] Distances from the source node to each other node */
	protected $distance;
	/** @var string[][] The previous node(s) in the path to the current node */
	protected $previous;
	/** @var integer[] Nodes which have yet to be processed */
	protected $queue;
	/**
	 * @param integer[][] $graph
	 */
	public function __construct($graph) {
		
		$this->graph = $graph;
	}
	/**
	 * Process the next (i.e. closest) entry in the queue
	 *
	 * @param string[] $exclude A list of nodes to exclude - for calculating next-shortest paths.
	 *
	 * @return void
	 */
	protected function processNextNodeInQueue(array $exclude) {
		// Process the closest vertex
		$closest = array_search(min($this->queue), $this->queue);
		if (!empty($this->graph[$closest]) && !in_array($closest, $exclude)) {
			foreach ($this->graph[$closest] as $neighbor => $cost) {
				if (isset($this->distance[$neighbor])) {
					if ($this->distance[$closest] + $cost < $this->distance[$neighbor]) {
						// A shorter path was found
						$this->distance[$neighbor] = $this->distance[$closest] + $cost;
						$this->previous[$neighbor] = array($closest);
						$this->queue[$neighbor]    = $this->distance[$neighbor];
					} elseif ($this->distance[$closest] + $cost === $this->distance[$neighbor]) {
						// An equally short path was found
						$this->previous[$neighbor][] = $closest;
						$this->queue[$neighbor]      = $this->distance[$neighbor];
					}
				}
			}
		}
		unset($this->queue[$closest]);
	}
	/**
	 * Extract all the paths from $source to $target as arrays of nodes.
	 *
	 * @param string $target The starting node (working backwards)
	 *
	 * @return string[][] One or more shortest paths, each represented by a list of nodes
	 */
	protected function extractPaths($target) {
		$paths = array(array($target));
		while (list($key, $path) = each($paths)) {
			if ($this->previous[$path[0]]) {
				foreach ($this->previous[$path[0]] as $previous) {
					$copy = $path;
					array_unshift($copy, $previous);
					$paths[] = $copy;
				}
				unset($paths[$key]);
			}
		}
		return array_values($paths);
	}
	/**
	 * Calculate the shortest path through a a graph, from $source to $target.
	 *
	 * @param string   $source  The starting node
	 * @param string   $target  The ending node
	 * @param string[] $exclude A list of nodes to exclude - for calculating next-shortest paths.
	 *
	 * @return string[][] Zero or more shortest paths, each represented by a list of nodes
	 */
	public function shortestPaths($source, $target, array $exclude = array()) {
		// The shortest distance to all nodes starts with infinity...
		$this->distance = array_fill_keys(array_keys($this->graph), INF);
		// ...except the start node
		$this->distance[$source] = 0;
		// The previously visited nodes
		$this->previous = array_fill_keys(array_keys($this->graph), array());
		// Process all nodes in order
		$this->queue = array($source => 0);
		while (!empty($this->queue)) {
			$this->processNextNodeInQueue($exclude);
		}
		if ($source === $target) {
			// A null path
			return array(array($source));
		} elseif (empty($this->previous[$target])) {
			// No path between $source and $target
			return array();
		} else {
			// One or more paths were found between $source and $target
			return $this->extractPaths($target);
		}
	}
}
?>

<?php
$ekkinisi=$_POST['ekkinisi'];
$telos=$_POST['termatismos'];
$type=$_POST['type'];
$proorismos=$telos;
echo $type; echo "<br>";
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$query1 = "SELECT hub FROM katastima WHERE onomasia='$ekkinisi'; ";
$result1 = $mysql_con->query($query1);
if (!$result1) 
{
	echo "mysql problem";
	die("FAIL: $sql BECAUSE: " . mysql_error());
}

$query2 = "SELECT hub FROM katastima WHERE onomasia='$telos'; ";
$result2 = $mysql_con->query($query2);
if (!$result2) 
{
	echo "mysql problem";
	die("FAIL: $sql BECAUSE: " . mysql_error());
}
while($row1 = $result1->fetch_array())
{
$rows1[] = $row1;
}

foreach($rows1 as $row1)
{
}while($row2 = $result2->fetch_array())
{
$rows2[] = $row2;
}
foreach($rows2 as $row)
{
}
$ekkinisi=$rows1[0][0]; $telos=$rows2[0][0];
echo "ΑΡΧΗ ΚΑΙ ΤΕΛΟΣ = ".$ekkinisi.">>".$telos."<hr>";
$i=0;
$count=0;
$timegraph = array( //time graph
  'IOANNINA' => array('PATRA' => 1, 'THESSALONIKI' => 1),
  'PATRA' => array('IOANNINA' => 1, 'ATHENS' => 1, 'KALAMATA' => 1),
  'KALAMATA' => array('ATHENS' => 1, 'PATRA' => 1 , 'IRAKLIO'=> 2 ),
  'IRAKLIO' => array('ATHENS' => 1, 'KALAMATA' => 2, 'ALEXANDROUPOLI' => 1),
  'ATHENS' => array('PATRA' => 1, 'KALAMATA' => 1, 'IRAKLIO' => 1, 'MITILINI' => 1,'ALEXANDROUPOLI'=> 1,'THESSALONIKI'=> 1,'LARISSA'=>1 ),
  'MITILINI' => array('ATHENS' => 1),
  'ALEXANDROUPOLI' => array('ATHENS' => 1, 'IRAKLIO' => 1, 'THESSALONIKI' => 1),
  'THESSALONIKI' => array('ATHENS' => 1, 'LARISSA' => 1, 'IOANNINA' => 1,'ALEXANDROUPOLI'=>1),
  'LARISSA' => array('ATHENS' => 1, 'THESSALONIKI' => 1),
); //cost graph
	$costgraph = array(
  'IOANNINA' => array('PATRA' => 3, 'THESSALONIKI' => 1),
  'PATRA' => array('IOANNINA' => 3, 'ATHENS' => 2, 'KALAMATA' => 2),
  'KALAMATA' => array('ATHENS' => 3, 'PATRA' => 2 , 'IRAKLIO'=> 4 ),
  'IRAKLIO' => array('ATHENS' => 10, 'KALAMATA' => 4, 'ALEXANDROUPOLI' => 15),
  'ATHENS' => array('PATRA' => 2, 'KALAMATA' => 3, 'IRAKLIO' => 10, 'MITILINI' => 8,'ALEXANDROUPOLI'=> 10,'THESSALONIKI'=> 5,'LARISSA'=>2 ),
  'MITILINI' => array('ATHENS' => 8),
  'ALEXANDROUPOLI' => array('ATHENS' => 10, 'IRAKLIO' => 15, 'THESSALONIKI' => 3),
  'THESSALONIKI' => array('ATHENS' => 5, 'LARISSA' => 1, 'IOANNINA' => 1,'ALEXANDROUPOLI'=>3),
  'LARISSA' => array('ATHENS' => 2, 'THESSALONIKI' => 1),
);


$diadromi;
if($type=='express'){//express
	$g = new Dijkstra($timegraph);
	$res=$g->shortestPaths($ekkinisi,$telos); //test1
//$res=$g->shortestPaths('LARISSA', 'ALEXANDROUPOLI'); //test2
print_r($res); echo"<br>"; $src=$ekkinisi;
$num_of_paths=count($res); echo $num_of_paths; echo " paths found<br>";
$sum=0;  $min=1500;
if($num_of_paths>1)
{
	foreach($res as $x )
{
	 $sum=0;
	//$src="ATHENS";
	
	foreach($x as $y)
	{
		$sum =$sum + $costgraph[$src][$y];	
	$src=$y;
	}
	print_r($x); echo "cost = ".$sum."<br>";
	if($sum<$min)
	{
		
		$min=$sum;
		$diadromi=$x;
		
	}
}
echo "epilexthike i "; print_r($diadromi); echo "<br>";
}else{
	$diadromi=$res['0'];
	print_r($res);
	print_r($diadromi);
}
}else{ //aplo
	$g = new Dijkstra($costgraph);
	$res=$g->shortestPaths($ekkinisi, $telos); $src=$ekkinisi; $diadromi;
	$num_of_paths=count($res); echo $num_of_paths; echo "paths found<br>"; $min=1500;
	if($num_of_paths>1)
{
	echo "now wil select with the less time<br>";
		foreach($res as $x )
{
	 $sum=0;
	//$src="ATHENS";
	print_r($x); echo "<br>";
	foreach($x as $y)
	{
		$sum =$sum + $timegraph[$src][$y];	
	$src=$y;
	}
	print_r($x); echo "time = ".$sum."<br>";
	if($sum<$min)
	{
		
		$min=$sum;
		$diadromi=$x;
		
	}
}
	print_r($diadromi);
}else{
	$diadromi=$res['0'];
	print_r($diadromi); echo "<br>";
}

}
echo "<hr>";
echo "teliki diadromi =>"; print_r($diadromi); echo "<hr>";
$diadromi_string="";
foreach($diadromi as $xx)
{
	
	$diadromi_string = $diadromi_string.$xx.'>';
}
echo "STRING=>".$diadromi_string."<hr>";
//teliki diadromi apothikeumeni sto diadromi_string variable
//diadromi initialized;
$timestap = (new DateTime())->getTimestamp();
$ek0 = $ekkinisi[0]; $ek1 = $ekkinisi[1];
$tel0 = $telos[0]; $tel1 = $telos[1];
$trackingnumber= $ek0.$ek1.$timestap.$tel0.$tel1;
echo $trackingnumber;
$qrimagename="QR_IMAGES_DELIVERIES/".$trackingnumber.".png";
QRcode::png($trackingnumber,$qrimagename,QR_ECLEVEL_H);//frames3,10);
$query = "INSERT INTO apostoli (ekkinisi,termatismos,trackingnumber,katastasi,typos,diadromi,topothesia) VALUES ('$ekkinisi','$proorismos','$trackingnumber','Υπό Επεξεργασία','$type','$diadromi_string','$ekkinisi');";
//$result = $mysql_con->query($query);
if ($mysql_con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
	printf("Errormessage: %s\n", mysqli_error($mysql_con));
    echo "Error: ";
}
$qry= "INSERT INTO topologia (trackingnumber,perioxi) VALUES ('$trackingnumber','$ekkinisi');";

if ($mysql_con->query($qry) === TRUE) {
    echo "New record created successfully";
} else {
	printf("Errormessage: %s\n", mysqli_error($mysql_con));
    echo "Error: ";
}

?>
</body>
</html>

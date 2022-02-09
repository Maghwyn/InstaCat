<?php 
class Image {
    //To do
}

class User {
	private $id;
	private $pseudo;
	private $email;
	private $pass;

	function __construct($id, $pseudo, $email, $pass) {
		$this -> id = $id;
		$this -> pseudo = $pseudo;
		$this -> email = $email;
		$this -> pass = $pass;
	}

	function getId() {
		return $this -> id;
	}

	function getValues() {
		return array("pseudo" => $this -> pseudo, 'email' => $this -> email, 'pass' => $this -> pass);
	}

	function name() {
		return strtolower(get_class($this) . "s");
	}
}

class BDD {
	private $host;
	private $port;
	private $bdname;
	private $user;
	private $pass;
	private $db;

	function __construct($host, $port, $bdname, $user, $pass) {
		$this -> host = $host;
		$this -> port = $port;
		$this -> bdname = $bdname;
		$this -> user = $user;
		$this -> pass = $pass;
	}

	function connect() {
		$dsn = 'mysql:host=' . $this -> host . ';dbname=' . $this -> bdname . ';port=' . $this -> port . '';
		$this -> db = new PDO($dsn, $this -> user, $this -> pass);
	}

	function disconnect() {
		$this -> db = null;
	}

	function insert($obj) {
		$str = "";
		$id = $obj -> getId();
		$values = $obj -> getValues();
		$name = $obj -> name();

		foreach($values as $el) { $str .= ", '".$el."'"; }
		$query = "INSERT INTO ".$name." VALUES (".$id.$str.")";
		$this -> db -> query($query);
	}

    //To do
	function update($query) {
		foreach($this -> db -> query($query) as $row) {
			print_r($row);
			print_r("Update");
		}
	}

    //To do
	function select($query) {
		return $this -> db -> query($query);
	}
}

/*--- How to use ---

    /!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\
    /!\                                                                                          /!\
    /!\    WARNING : The BDD infos will be loaded from a config file ignored with .gitignore.    /!\
    /!\              What you should do is as explained below.                                   /!\
    /!\              NEVER push the BDD infos if it's not grayed out from .gitignore.            /!\
    /!\                                                                                          /!\
    /!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\/!\

    include_once(__DIR__."BDD_infos_path -> config.php");
    include_once(__DIR__."CLASS_path -> database.php");

    try {
        $bd = new BDD(config_db["host"], config_db["port"], config_db["dbname"], config_db["user"], config_db["pass"]);
        $user = new User($key, $pseudo, $email, $password);

        $bd -> connect();
        $bd -> insert($user);
        $bd -> select("query"); // For now..
        $bd -> disconnect();
    }
    catch (Exception $e) {
        die($e->getMessage());
    }

*/

?>
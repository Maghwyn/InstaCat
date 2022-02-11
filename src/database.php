<?php 
class Comment {
    private $id;
    private $imgid;
    private $userid;
    private $content;

    function __construct($id, $imgid, $userid, $content) {
        $this -> id = $id;
        $this -> imgid = $imgid;
        $this -> userid = $userid;
        $this -> content = $content;
    }

    function getId() {
        return $this -> id;
    }

    function getValues() {
        return array("imageId" => $this -> imgid, 'urserIdComment' => $this -> userid, 'textComment' => $this -> content);
    }

    function name() {
        return get_class($this);
    }
}

class Image {
    private $id;
    private $userid;
    private $url;
    private $like;

    function __construct($id, $userid, $url, $like) {
        $this -> id = $id;
        $this -> userid = $userid;
        $this -> url = $url;
        $this -> like = $like;
    }

    function getId() {
        return $this -> id;
    }

    function getValues() {
        return array("userIdImage" => $this -> userid, 'urlImage' => $this -> url, 'likeImage' => $this -> like);
    }

    function name() {
        return get_class($this);
    }
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
        return array("pseudo" => $this -> pseudo, 'email' => $this -> email, 'password' => $this -> pass,
                     "profilPicture" => "", "profililDesc" => "");
    }

    function name() {
        return get_class($this);
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
        var_dump($query);
        $this -> db -> query($query);
    }

    function insert_msg($obj) {
        $id = $obj -> getId();
        $values = $obj -> getValues();
        $name = $obj -> name();

        $query = "INSERT INTO ".$name." VALUES (".$id.", ".$values["imageId"].", ".$values["urserIdComment"].", '".$values["textComment"]."')";
        $this -> db -> query($query);
    }

    //To do
    function update($query) {
        return $this -> db -> query($query);
    }

    //To do
    function select($query) {
        return $this -> db -> query($query);
    }
}
?>
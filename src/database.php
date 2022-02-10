<?php 
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

    // function checkImg($imageProps) {
    //     $errors= array();
    //     $imgName =  $imageProps['name'];
    //     $imgSize = $imageProps['size'];
    //     $imgTemp = $imageProps['temp'];
    //     $imgType = $imageProps['type'];
    //     $extension = explode('.',$imageProps['name']);
    //     $imgExt = strtolower(end($extension));
    //     $extensions= array("jpeg","jpg","png");

    //     if(in_array($imgExt,$extensions)=== false){
    //         $errors[]="Choose a JPEG or PNG file.";
    //     }
    //     if($imgSize > 2000000){
    //         $errors[]='Size max 2 MB';
    //     }
    // }

    // function createFileImage($imageProps) {
    //     $errors = $this->checkImg($imageProps);
    //     if(sizeof($errors) > 0) return $errors;

    //     $this->img_Type = strtolower(end(explode('.',$imageProps['name'])));
    //     $this->date = date('Y-m-d');
    //     $imgName = $this->Id_image.'.'.$this->img_Type;
    //     move_uploaded_file($imageProps['temp'],'images/'.$imgName);

    //     // $createImg = "INSERT INTO `Image` (`imageId`,`userIdImage`,`likeImage`) VALUES ('".$this->Id_image."','".$this->userId_Img."','".$this->like_Img."')";
    //     // $db->query($createImg);
    //     // $this->Id_image = $db->imageId;
    // }

    // function getFileImage() {
    //     $this->Id_image = $getImages['imageId'];
    //     $this->userId_Img = $getImages['userIdImage'];
    //     $this->like_Img = $getImages['likeImage'];

    //     // $getImg = "SELECT * FROM `Image` WHERE `imageId`=".$this->Id_image;
    //     // $getImage = $db->query($getImg);
    //     // $getImages = $getImage->fetch_assoc();
    // }

    // function addTag($tagImg) {
    //     $tag = new Tag();
    //     $tag->imageId = $this->Id_image;
    //     $tag->tagImg = $tagImg;
    //     $tag->create();
    // }

    // function deleteImage() {
    //     $deleteImg = "DELETE FROM `Image` WHERE `imageId`=$this->Id_image";
    //     $db->query($deleteImg);
    // }

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
        return array("pseudo" => $this -> pseudo, 'email' => $this -> email, 'password' => $this -> pass);
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
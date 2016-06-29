<?php
session_start ();
class Post {
    
    public $db;
    
    public function __construct ($host, $user, $pass, $db) {
        $this -> db = mysql_connect ($server, $user, $pass);
        if(!$this->db) {
            exit ('no connetc');
        }
        if(!mysql_select_db ($db, $this->db)) {
            exit ('no table');
        }    
        mysql_query("SET NAMES utf8");
        
        return $this->db;
    }

// ----- РАБОТА СО СТАТЬЯМИ ------------    
    
    public function get_all_db ($lim0,$lim) {
        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT $lim0,$lim";
        
        $res = mysql_query($sql);
        if(!$res){
            return FALSE;
        }
        for ($i = 0; $i < mysql_num_rows($res); $i++){
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        return $row;
        
    }
    // какой-то лютый пиздец, который возвращает количество статей
    public function get_num_row_db () {
        $sql = "SELECT id FROM articles";
        $res = mysql_query($sql);
        $num_row = mysql_num_rows($res);
        return $num_row;
        
    }
    
    public function get_one_db ($id) {
        $sql = "SELECT id, title, content, date FROM articles WHERE id = '$id'";
        $res = mysql_query ($sql);
        if (!$res) {
            return FALSE;
        }
        $row = mysql_fetch_array ($res, MYSQL_ASSOC);
        return $row;
    }
    // метод добавления новой статьи
    public function get_new_db ($title, $content) {
        $author = $_SESSION['login'];
        $date = date("Y-m-d H:i:s");
        $val = '0;';
        $sql = "INSERT INTO articles (title, date, content, author, valuing) VALUES ('$title', '$date', '$content', '$author', '$val')"; //добавить экранирование значений
        $res = mysql_query ($sql);
        
        if (!$res) {
            return FALSE;
        }
        return header ("Location: ../index.php"); //возвращает на главную
        
    }
    //метод для редактирования существующей статьи
    public function get_edit_db ($id, $title, $content) {
        $sql = "UPDATE articles SET title='$title', content='$content' WHERE id='$id'";
        $res = mysql_query ($sql);
        if (!$res)
            return FALSE;
        return header ("Location: ../index.php");
    }
    // метод для удаления статьи
    public function get_del_db ($id) {
        
        $sql = "DELETE FROM articles WHERE id='$id'";
        $res = mysql_query ($sql);
        if (!$res) {
            return FALSE;
        }
        return header ("Location: ../admin.php?action=ctrl_posts");
    }
// ---- извлечение постов по конкретному автору --     
    public function get_all_moder_db () {
        $login = $_SESSION['login'];
        $sql = "SELECT * FROM articles WHERE author ='$login' ORDER BY id DESC";
        
        $res = mysql_query($sql);
        if(!$res){
            return FALSE;
        }
        for ($i = 0; $i < mysql_num_rows($res); $i++){
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        return $row;               
    }
//--------РЕЙТИНГ
    public function rating ($id_post, $rating) {
        $sql = "SELECT rating, valuing FROM articles WHERE id = '$id_post'";
        $res = mysql_query ($sql);
        $row = mysql_fetch_array ($res);
        $rat = $row['rating'];
        $val = $row['valuing'];
        if (!res) return FALSE;
        
        if ($rating == '+') {
            $rat +=1;
            $val .=$rating.$_SESSION ["id_user"].';'; 
        }
        if ($rating == '-') {
            $rat -=1;
            $val .=$rating.$_SESSION ["id_user"].';'; 
        }
        $sql_up = "UPDATE articles SET rating='$rat', valuing='$val' WHERE id = '$id_post' ";
        $res_up = mysql_query ($sql_up);
    }
    /////////////////////////////////
    public function valuing ($id_post, $id_user) {
        $user_p = '+'.$id_user.';';
        $user_m = '-'.$id_user.';';
        $sql = "SELECT * FROM articles WHERE id = '$id_post'";
        $res = mysql_query ($sql);
        $row = mysql_fetch_array ($res);
        
        $rat_c = $row ['rating'];
        $val = $row ['valuing'];
        $pos_p = strripos($val,$user_p);
        $pos_m = strripos($val,$user_m);
        if ($pos_p > 0 or $pos_m > 0) {
            $rat = $row ['rating'];
        }
        return $rat;
    }
//////////////////////////////////////
    public function best_post () {
        $sql = "SELECT * FROM articles WHERE rating = (SELECT MAX(rating) FROM articles)";
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        
        return $row;
    }
//////////////////////////
    public function pop_post () {
        if ($_GET['tag'] == 'all') {
            $lim = 10;
            
        }
        else /*if (isset($_GET['tag']))*/ {
            $lim = 3;
        }
            $sql = "SELECT S.tag, SUM(A.rating) AS tag_rat FROM articles as A, section as S WHERE A.id_sect = S.id_sect GROUP BY S.tag ORDER BY tag_rat DESC LIMIT $lim";
        
        $res = mysql_query($sql);
        
        for ($i = 0; $i < mysql_num_rows($res); $i++) {
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        
        return $row;
    }
    public function get_tag_db ($lim0,$lim) {
        
        $tag = $_GET['tag'];
        $sql = "SELECT * FROM articles AS A, section AS S WHERE A.id_sect = S.id_sect AND S.tag = '$tag' ORDER BY id DESC LIMIT $lim0,$lim";
        
        $res = mysql_query($sql);
        if(!$res){
            return FALSE;
        }
        for ($i = 0; $i < mysql_num_rows($res); $i++){
            $row[] = mysql_fetch_array($res, MYSQL_ASSOC);
        }
        return $row;
    }
    public function get_num_row_tag ($tag) {
        $sql = "SELECT * FROM articles AS A, section AS S WHERE A.id_sect = S.id_sect AND S.tag = '$tag'";
        $res = mysql_query($sql);
        $num_row = mysql_num_rows($res);
        return $num_row;
    }
}
?>
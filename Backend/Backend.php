<?php 
class Backend
{
    private $host = "localhost";
    private $user = "root";
    private $database = "OnlineExam";
    protected $attrs = array();
    protected $table;
    protected $connection;
    protected $query;
    function connection()
    {
        $conn = mysqli_connect($this->host, $this->user, "", $this->database);
        if ($conn->connect_errno > 0) {
            die('Unable to connect to Databse [' . $conn->connect_error . ']');
        } else {
            $this->connection = $conn;
            return $conn;
        }
    }
    function check_insert_query()
    {
        $val = "INSERT  INTO $this->table VALUES(";
        for ($i = 0; $i < count($this->attrs); $i++) {
            $attr = $this->attrs[$i];
            if ($i == (count($this->attrs) - 1)) {
                if ($attr === null) {
                    $val = $val . NULL . ")";
                } elseif (is_string($attr) || $attr == '') {
                    $val = $val . "'" . $attr . "');";
                } else {
                    $val = $val . $attr . ");";
                }
            } else {
                if ($attr === null) {
                    $attr = "null";
                    $val = $val . $attr . ",";
                } elseif (is_string($attr) || $attr == '') {
                    $val = $val . "'" . $attr . "',";
                } else {
                    $val = $val . $attr . ",";
                }
            }
        }
        return $val;
        // echo "<script>consol.log($val)</script>";
    }
    function insert()
    {
        $val = $this->check_insert_query();
        $this->query = $val;
        if (mysqli_query($this->connection, $val)) {
            return mysqli_insert_id($this->connection);
        } else {
            return false;
        }
    }

    /**
     * Set the value of attrs,connection and tables
     *
     * @return  self
     */
    public function setAttrs($connection, $table, $attrs)
    {
        $this->attrs = $attrs;
        $this->table = $table;
        $this->connection = $connection;
        return $this;
    }

    /**
     * Get the value of query
     */
    public function getQuery()
    {
        return $this->query;
    }


    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    function auth($conn, $user_name, $password)
    {
        $query = mysqli_query($conn, "SELECT * FROM Users WHERE Username = '" . $user_name . "'") or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($query);
        if ($row == null) {
            return null;
        } else {
            $de_pass = password_verify($password, $row['Pass']);
            if ($user_name == $row['Username'] && $de_pass) {
                return $row;
            } else {
                return null;
            }
        }
    }
    function fetchAll($conn, $table)
    {
        $query = mysqli_query($conn, "SELECT * FROM $table;") or die(mysqli_error($conn));
        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if ($row == null) {
            return null;
        } else {
            return $row;
        }
    }
    function fetchnews($conn, $table)
    {
        $query = mysqli_query($conn, "SELECT * FROM $table ORDER BY Dofp DESC;") or die(mysqli_error($conn));
        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if ($row == null) {
            return null;
        } else {
            return $row;
        }
    }
    function fetch($conn, $table, $attr, $col)
    {
        if (is_string($attr)) {
            $attr = "'" . $attr . "'";
            // echo $attr;
        }
        $query = mysqli_query($conn, "SELECT * FROM $table WHERE $col = " . $attr . ";") or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($query);
        if ($row == null) {
            return null;
        } else {
            return $row;
        }
    }
    function logout()
    {
        session_unset();
        session_destroy();
        
    }
}

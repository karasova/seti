<?php

    class Event {
        private $number;
        private $bill_account;
        private $balance;
        private $id;

        public $table = 'accounts';

        public static function get_pdo(){
            $_pdo;
            if (empty($_pdo)) {
                $_pdo = new PDO('mysql:host=localhost; dbname=agi', 'root', ''); 
            }
            return $_pdo;
        }

        public function check_and_fill(){
            $this->number = $_POST['number'];  
            
            $this->bill_account = $_POST['bill_account'];  
            
            $this->balance = $_POST['balance'];    

            

        }

        public function write_to_db(){
            $sql = static::get_pdo()->prepare('INSERT INTO `' . $this->table . '` (`number`, `bill_account`, `balance`) VALUES (?,?,?);');
            $sql->execute(array($this->number, $this->bill_account, $this->balance));
            
            return $sql->rowCount() === 1;
        }

        public function add_event(){
            $this->check_and_fill();

            if ($this->write_to_db())
                header('location: index.php');
            exit;
            
        }

        public function read_from_db(){            
            $this->put_done();
                      
            $sql = static::get_pdo()->prepare('SELECT id, number, bill_account, balance FROM `'. $this->table .'` '); 
            
            $sql->execute(); 

            $str = "";

                while ($object = $sql->fetchObject(static::class)){
                    $id = $object->id;
                    $str .= "<tr><td> <a href= 'planner/task.php?id=$object->id'>" . $object->number . "</td><td>" . $object->bill_account . "</td><td>" . $object->balance . "</td><td>" . "</td><td><input type='checkbox' name='dones[]' value = ". $id . "></td></tr>" ;
                }

            return $str;
        }

        public function put_done(){
            if (!empty($_POST['dones'])){
                $dones = $_POST['dones'];                
                
                foreach ($dones as $key){
                    $sql = $this->get_pdo()->prepare('DELETE from`'.$this->table .'` WHERE `id` = ?;');
                    $sql->execute(array($key));
                }
            }
        }

        public function read_by_id($id){
            $sql = static::get_pdo()->prepare('SELECT * FROM `' . $this->table . '` WHERE `id` =' . $id . ';');
            $sql->execute();

            $object = $sql->fetchObject(static::class);
            $this->id = $id;
            $this->number = $object->number;
            $this->bill_account = $object->bill_account;
            $this->balance = $object->balance;
            $_POST['number'] = $object->number;
            $_POST['bill_account'] = $object->bill_account;
            $_POST['balance'] = $object->balance;
        }

        public function update_db(){
            $this->number = isset($_POST['number']) ? trim($_POST['number']) : null;
            $this->bill_account = isset($_POST['bill_account']) ? trim($_POST['bill_account']) : null;
            $this->balance = isset($_POST['balance']) ? trim($_POST['balance']) : null;

           
            $sql = static::get_pdo()->prepare('UPDATE `'.$this->table.'` SET `number`= ?, `bill_account`= ?, `balance`= ? where `id`= ? limit 1;');
            $sql->execute(array($this->number, $this->bill_account, $this->balance, $_GET['id']));
            
        }
    }
?>


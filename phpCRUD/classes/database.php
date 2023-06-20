<?php 
    class database
    {
        function opencon()
        {
            return new PDO('mysql:host=localhost; dbname=student', 'root', '');
        }

        function signup($username,$password)
        {
            $con = $this->opencon();
            return $con->prepare("INSERT INTO login (username,password) VALUES (?,?)")
                        ->execute([$username,$password]);
        }

        function check($username,$password)
        {
            $con = $this->opencon();
            $query = "SELECT * from login WHERE username='".$username."' && password='".$password."'";
            return $con->query($query)
                        ->fetch();
        }

        function save($dtoday, $sname, $invnum, $invdate, $descri, $datepaid)
        {
            $con = $this->opencon();
            return $con->prepare("INSERT INTO studinfo (dtoday, sname, invnum, invdate, descri, datepaid ) VALUES (?,?,?)")
                        ->execute($dtoday, $sname, $invnum, $invdate, $descri, $datepaid);
        }

        function view()
        {
            $con = $this->opencon();
            return $con->query("SELECT * from studinfo")->fetchAll();
        }

        function viewdata($id)
        {
            $con = $this->opencon();
            return $con->query("SELECT * from studinfo WHERE id='".$id."'")->fetch();
        }

        function update($id, $dtoday, $sname, $invnum, $invdate, $descri, $datepaid)
        {
            $con = $this->opencon();
            return $con->prepare("UPDATE studinfo set dtoday=?,sname=?,invnum=?,invdate=?,descri=?,datepaid=? WHERE id=$id")
                        ->execute([dtoday, $sname, $invnum, $invdate, $descri, $datepaid]);
        }

        function delete($id)
        {
            $con = $this->opencon();
            return $con->prepare("DELETE from studinfo WHERE id=$id")->execute();
        }

    }

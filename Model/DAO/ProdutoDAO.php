<?php
class ProdutoDAO {


    public  function listarTudo(){

        $sql = "SELECT * FROM protudos WHERE 1";

        $result = mysql_query($sql);

        if( mysql_num_rows($result) > 0){

            $l = array();

            for($i=0; $i < @mysql_num_rows($result); $i++){
                  $l[$i] = new Protudo();
                  $l[$i]->setNome(mysql_result($result, $i, "nome"));

            }

            return $l;
        }

        return;
    }


} 
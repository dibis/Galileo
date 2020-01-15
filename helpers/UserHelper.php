<?php

namespace app\helpers;

use yii;
use app\models\AuthAssignment;

class UserHelper {

    //Método para obtener el nivel de un usuario y si ha completado su registro
    //o no
    public function nivelUsuario($user) {

        $nivel;
        $selection = AuthAssignment::find()->select('item_name')->where(['user_id' => $user])->one();
        $select = $selection['item_name'];


        if($select == "superadmin"){
            $nivel =1;
        }elseif ($select == "admin") {
            $nivel=2;
        }elseif ($select == "editor") {
            $nivel=3;
        }elseif($select == "user"){
            $nivel = 4;
        }
        
        return $nivel;

    }

    //Función que obtiene el id de un usuario
    public function userId($username) {

        $command = Yii::$app->db->createCommand("SELECT id "
                . "FROM user "
                . "WHERE username=$username;");
        $querysql = $command->queryOne();

        $indicador = $querysql['id'];

        return $indicador;
    }

}

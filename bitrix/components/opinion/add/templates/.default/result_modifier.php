<?php
/**
 * Created by PhpStorm.
 * User: alteraSPB74
 * Date: 25.01.2017
 * Time: 16:47
 */

function selectedSelectOpinion($name,$value){
    if($value == $_REQUEST[$name]){
        return 'selected="selected"';
    }
}
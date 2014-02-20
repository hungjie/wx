<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';
require_once MAIN_PATH.'/db.php';
require_once MAIN_PATH.'/msisdn_infos.php';


$msisdn = new msisdnProcess();

$msisdn->insert_meal(array(
    'name'=>"红烧肉套餐",
    'price'=>10.00,
    'desc'=>'',
));
$msisdn->insert_meal(array(
    'name'=>"梅菜扣肉套餐",
    'price'=>16.00,
    'desc'=>'',
));
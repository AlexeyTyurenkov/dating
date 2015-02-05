<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cities
 *
 * @author alterego4
 */
class cities {
    //put your code here
    public function getAllCities()
    {
        $sql=”SELECT id, name FROM city″;
        $cities = Yii::app()->db->CreateCommand($sql)->queryAll();

        if(!$cities) return array();

        foreach($city as $cities)
        {
            $result[$city[‘id’]] = $city[‘name’];
        }
        return $result;
    }
}

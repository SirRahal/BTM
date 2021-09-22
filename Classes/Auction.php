<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 10/8/2019
 * Time: 5:40 PM
 */

class Auction
{

    var $URL;
    var $IMG;
    var $Title;
    var $Date;

    public function __construct($url, $img, $title, $date=null)
    {
        $this->URL = $url;
        $this->IMG = $img;
        $this->Title = $title;

        $this->Date = $date;
    }
}
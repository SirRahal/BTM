<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 10/8/2019
 * Time: 5:40 PM
 */

class BTMAuction
{
    var $ID;
    var $Title;
    var $URL;
    var $Description;
    var $IMG;
    var $Date;
    var $Category;
    var $Priority;
    var $Location;

    var $RawDate;

    public function __construct($row)
    {
        if($row != null){
            $this->ID = $row[0];
            $this->Title = $row[1];
            $this->URL = $row[2];
            $this->Description = $row[3];
            $this->IMG = $row[4];
            $phpdate = strtotime( $row[5] );
            $this->Date = date( 'M d Y g:i A', $phpdate ) . " EST";
            $this->RawDate = date( 'Y-m-d\TH:i', $phpdate );
            $this->Category = $row[6];
            $this->Priority = $row[7];
            $this->Location = $row[8];
        }else{
            $this->ID = 'NEW';
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 10/8/2019
 * Time: 5:42 PM
 */
require_once "Auction.php";

class GetLAGAuctions
{
    private $APIKeyID = "cca1d9f4-3961-49aa-9019-2b4d47834518";
    private $APIKeyPass = "ej7HEks26KhdommpqHW5jd7913jSHW6Wh2jS7hh";
    private $BaseURL = "https://www.liveauctiongroup.com/api/auctions";
    private $CH;
    private $BASE_URL = "https://auctions.btmindustrial.com/";

    public $Status = false;
    public $Auctions;

    public function __construct()
    {
        try{
            error_reporting(0);
            $this->CH = $this->curlSetup();
            $data = $this->callAPICurl();
            $sessionData =  json_decode($data,true);
            $sessions = $sessionData['sessions'];

            //print_r($sessions);
            $this->Auctions = array();
            for($i=0; $i<count($sessions); $i++){
                $auctionURL = $this->buildAuctionURL($sessions[$i]['sessionId'], $sessions[$i]['auctionTitle']);
                //https://auctions.btmindustrial.com/Mitsubishi-CNC-Parts-10-30-19_as61007
                array_push($this->Auctions, new Auction(
                    $auctionURL,
                    $sessions[$i]['thumbnailUrl'],
                    $sessions[$i]['auctionTitle']
                ));
            }
            curl_close($this->CH);
            if(count($this->Auctions) > 0){
                $this->Status = true;
            }
        } catch (Exception $ex) {
            //do nothing
        }

    }

    function curlSetup(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->BaseURL);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        return $ch;
    }

    function callAPICurl(){
        $result=null;
        $encodedAuth = base64_encode($this->APIKeyID . ':' . $this->APIKeyPass);
        curl_setopt($this->CH, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $encodedAuth));
        curl_setopt($this->CH, CURLOPT_RETURNTRANSFER, true);
        try{

            $result = curl_exec($this->CH);
            if(!$result){
                //die;
                return null;
            }
        }catch (Exception $ex){
            //Do nothing
        }
        return $result;
    }

    //https://auctions.btmindustrial.com/Mitsubishi-CNC-Parts-10-30-19_as61007
    function buildAuctionURL($sessionID, $auctionTitle){
        return $this->BASE_URL. str_replace(' ', '-',$auctionTitle).'_as'.$sessionID;
    }
}


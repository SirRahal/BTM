<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 11/9/2019
 * Time: 1:41 PM
 */

$apikey = '89e4554f4cdc99d9bc741dec91fcc70a ';
$username = 'btmindustrial';
$list_name = "OnlineSignup";

include_once 'request_rest.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
try{
    getSubscription($firstName, $lastName, $mobileNumber,$email, $username, $apikey);
}catch (Exception $ex){

}


// This function will search if the mobile number exists in the database.
// If the subscription exists, it will grab the existing subscription_id and edit the subscription with (POST).
// If the subscription does not exist, it will add it as a new record.
function getSubscription($firstName, $lastName, $mobileNumber,$email, $username, $apikey) {
	// Account information
	global $apikey, $username;

	// Generating the URL to search for a subscription
	$request_url = "http://api.trumpia.com/rest/v1/" . $username . "/subscription/search?";
	$search_type = "2";
	$search_data = $mobileNumber;
	$request_url = $request_url . "search_type=" . $search_type . "&search_data=" . $search_data;

	// Creating a request
	$request_rest = new RestRequest();
	$request_rest->setRequestURL($request_url);
	$request_rest->setAPIKey($apikey);
	$request_rest->setMethod("GET");
	$result = $request_rest->execute();

	$response_status = $result[0];
	$json_response_data = $result[1];

	// Decode the JSON response into a string
	$json_data = json_decode($json_response_data, true);

	// Check if the parameter "subscription_id_list" exists. If yes, the subscription will be updated and added to the desired list.
	if(array_key_exists('subscription_id_list', $json_data)) {
		$subscription_id = $json_data["subscription_id_list"][0];
		postSubscription($firstName, $lastName, $mobileNumber, $subscription_id,$email, $username, $apikey);

	} elseif(array_key_exists('status_code', $json_data)) { // If the parameter "status_code" exists, the subscription does NOT exist in the system.
		// Add the contact using PUT Subscription

		putSubscription($firstName, $lastName, $mobileNumber, $username, $apikey, $email);
	}

	return;
}

// This function will add a new subscription
function putSubscription($firstName, $lastName, $mobileNumber, $username, $apikey, $email) {

	// Generate the URL to add the subscription
	$request_url = "http://api.trumpia.com/rest/v1/" . $username . "/subscription";

	// Subscription information
	$request_data = array(
		"list_name" => "OnlineSignup",
		"subscriptions" => array(
			array(
		"first_name" => $firstName,
		"email" => $email,
		"last_name" => $lastName,
			"mobile" => array("number" => $mobileNumber, "country_code" => "1"),
	        "voice_device" => "mobile"
	        )
		)
	);

	// Creating a request
	$request_rest = new RestRequest();
	$request_rest->setRequestURL($request_url);
	$request_rest->setAPIKey($apikey);
	$request_rest->setRequestBody(json_encode($request_data));
	$request_rest->setMethod("PUT");
	$result = $request_rest->execute();
	$response_status = $result[0];
	$json_response_data = $result[1];

	// Decode the JSON response into a string.
	$json_data = json_decode($json_response_data, true);

	// Store the request_id value. The request_id is important to check the status of the API request.
	$request_id = $json_data["request_id"];

	// Send the request_id to the GET Report function.
	getReport($request_id, $username, $apikey);

	return;
}

// This function will edit a subscription
function postSubscription($firstName, $lastName, $mobileNumber, $subscription_id, $email, $username, $apikey) {

	// Generat the URL to edit the subscription.
	$request_url = "http://api.trumpia.com/rest/v1/" . $username . "/subscription/" . $subscription_id;

	// Subscription information
	$request_data = array(
		"list_name" => "OnlineSignup",
		"subscriptions" => array(
			array(
				"first_name" => $firstName,
				"last_name" => $lastName,
				"mobile" => array($mobileNumber, "country_code" => "1"),
				"email" => $email,
				"voice_device" => "mobile"
				)
			)
		);

	// Creating a request
	$request_rest = new RestRequest();
	$request_rest->setRequestURL($request_url);
	$request_rest->setAPIKey($apikey);
	$request_rest->setRequestBody(json_encode($request_data));
	$request_rest->setMethod("POST");
	$result = $request_rest->execute();

	$response_status = $result[0];
	$json_response_data = $result[1];

	// Decode the JSON response into a string
	$json_data = json_decode($json_response_data, true);
	// Store the request_id value. The request_id is important to check the status of the API request.
	$request_id = $json_data["request_id"];

	// Send the request_id to the GET Report function.
	getReport($request_id, $username, $apikey);

	return;
}

// This function will use the request_id to check the status of the request.
// The JSON response will have the status_code. The status_code will tell us about any errors.
function getReport($request_id, $username, $apikey) {
	// Generate the URL to check the status of the request
	$request_url = "http://api.trumpia.com/rest/v1/" . $username . "/report/" . $request_id;

	$request_rest = new RestRequest();
	$request_rest->setRequestURL($request_url);
	$request_rest->setAPIKey($apikey);
	$request_rest->setMethod("GET");
	$result = $request_rest->execute();
	$response_status = $result[0];
	$json_response_data = $result[1];

	// Decode the JSON response into a string
	$json_data = json_decode($json_response_data, true);

	// Check to see if the "status_code" parameter exists in the JSON response
	if(array_key_exists("status_code", $json_data)) {
		// Store the status_code in a string
		$status_code = $json_data["status_code"];

		// The system is still processing the request if the status code is MPCE4001
		// Continue to GET Report if status_code is in progress
		// Information on status codes can be found at: http://api.trumpia.com/docs/rest/status-code.php
		if($status_code == "MPCE4001"){
			sleep(1);
			getReport($request_id, $username, $apikey);
		} elseif($status_code == "MPSE1201") {
			alert("Request failed - not a valid list_name value.");
		} else{
            alert("An error has occurred status_code is ".$status_code);
		}

	} elseif(isset($json_data[0]["status_code"])) {
		// Check if the "status_code" parameter exists. The status_code is in an array because PUT and POST subscription allows you to add/edit multiple contacts.
		// Each subscription will be in its own array. This example include one array because we are only adding one contact.
		$status_code = $json_data[0]["status_code"];

		// Status code MPSE0501 means the phone number has texted STOP to the short code and is blocked.
		// The mobile device can text HELP to the SHORT CODE to remove this block.
		if($status_code == "MPSE0501") {
			alert("Mobile number is blocked.");
		} elseif($status_code == "MPSE2201") {
			alert("Invalid mobile number.");
		}

	// Subscription added or updated successfully
	} elseif(array_key_exists("subscription_id", $json_data)){
        header("Location: index.php?alert=success&message=signup");
	} elseif(isset($json_data[0]["subscription_id"])) {
        header("Location: index.php?alert=success&message=update");
	}
	return;
}

// Javascript pop-up error message function
function alert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<?php /** 
* Generated by
* 
*      _____ _          __  __      _     _
*     / ____| |        / _|/ _|    | |   | |
*    | (___ | | ____ _| |_| |_ ___ | | __| | ___ _ __
*     \___ \| |/ / _` |  _|  _/ _ \| |/ _` |/ _ \ '__|
*     ____) |   < (_| | | | || (_) | | (_| |  __/ |
*    |_____/|_|\_\__,_|_| |_| \___/|_|\__,_|\___|_|
*
* The code generator that works in many programming languages
*
*			https://www.skaffolder.com
*
*
* You can generate the code from the command-line
*       https://npmjs.com/package/skaffolder-cli
*
*       npm install -g skaffodler-cli
*
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
*
* To remove this comment please upgrade your plan here: 
*      https://app.skaffolder.com/#!/upgrade
*
* Or get up to 70% discount sharing your unique link:
*       https://app.skaffolder.com/#!/register?friend=5cc27f4b674981322641aa1a
*
* You will get 10% discount for each one of your friends
* 
*/
?>
<?php
	require_once './db/dbTest1_dbManager.php';
	
/*
 * SCHEMA DB Company
 * 
	{
		Industry: {
			type: 'String'
		},
		Name: {
			type: 'String'
		},
		//RELAZIONI
		
		
		//RELAZIONI ESTERNE
		
		
	}
 * 
 */


//CRUD METHODS


//CRUD - CREATE


$app->post('/company',	function () use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'Industry'	=> isset($body->Industry)?$body->Industry:'',
		'Name'	=> isset($body->Name)?$body->Name:'',
			);

	$obj = makeQuery("INSERT INTO company (_id, Industry, Name )  VALUES ( null, :Industry, :Name   )", $params, false);

	
	echo json_encode($body);
	
});
	
//CRUD - REMOVE

$app->delete('/company/:id',	function ($id) use ($app){
	
	$params = array (
		'id'	=> $id,
	);

	makeQuery("DELETE FROM company WHERE _id = :id LIMIT 1", $params);

});
	
//CRUD - GET ONE
	
$app->get('/company/:id',	function ($id) use ($app){
	$params = array (
		'id'	=> $id,
	);
	
	$obj = makeQuery("SELECT * FROM company WHERE _id = :id LIMIT 1", $params, false);
	
	
	
	echo json_encode($obj);
	
});
	
	
//CRUD - GET LIST

$app->get('/company',	function () use ($app){
	makeQuery("SELECT * FROM company");
});


//CRUD - EDIT

$app->post('/company/:id',	function ($id) use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'id'	=> $id,
		'Industry'	    => isset($body->Industry)?$body->Industry:'',
		'Name'	    => isset($body->Name)?$body->Name:''	);

	$obj = makeQuery("UPDATE company SET  Industry = :Industry,  Name = :Name   WHERE _id = :id LIMIT 1", $params, false);

	
	echo json_encode($body);
    	
});


/*
 * CUSTOM SERVICES
 *
 *	These services will be overwritten and implemented in  Custom.js
 */

			
?>
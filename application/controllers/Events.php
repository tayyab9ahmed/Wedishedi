<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//define('STDIN',fopen("php://stdin","r"));
class Events  extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * This page contain event calendar based google calendar
	 * author: Faysal Mahamud
	 * email:  faysal.turjo@gmail.com
	 */
    public function __construct()
    {
            parent::__construct();
            require FCPATH.'vendor/autoload.php';
            $this->load->helper('url');
      	 		$this->load->model('events_model'); 

          
    }

public function get_events()
 {
     // Our Start and End Dates
     $start = $this->input->get("start");
     $end = $this->input->get("end");

     $startdt = new DateTime('now'); // setup a local datetime
     $startdt->setTimestamp($start); // Set the date based on timestamp
     $start_format = $startdt->format('Y-m-d H:i:s');

     $enddt = new DateTime('now'); // setup a local datetime
     $enddt->setTimestamp($end); // Set the date based on timestamp
     $end_format = $enddt->format('Y-m-d H:i:s');

     $events = $this->events_model->get_events($start_format, $end_format);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "Id" => $r->Event_id,
             "title" => $r->Event_title,
             "desc" => $r->Event_desc,
             "end" => $r->Event_end_date,
             "start" => $r->Event_start_date
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
 }

public function add_event() 
{
	
    /* Our calendar data */
    $name = $this->input->post("title", TRUE);
    $desc = $this->input->post("content_event", TRUE);
    $start_date = $this->input->post("start", TRUE);
    $end_date = $this->input->post("end", TRUE);
    $event_type = $this->input->post("event_type", TRUE);
    $guest_name = $this->input->post("guest_name", TRUE);
    if(!empty($start_date)) {
       $sd = DateTime::createFromFormat("Y-m-d", $start_date);
       $start_date = $sd->format('Y-m-d H:i:s');
       $start_date_timestamp = $sd->getTimestamp();
    } else {
       $start_date = date("Y-m-d H:i:s", time());
       $start_date_timestamp = time();
    }

    if(!empty($end_date)) {
       $ed = DateTime::createFromFormat("Y-m-d", $end_date);
       $end_date = $ed->format('Y-m-d H:i:s');
       $end_date_timestamp = $ed->getTimestamp();
    } else {
       $end_date = date("Y-m-d H:i:s", time());
       $end_date_timestamp = time();
    }

    $this->events_model->add_event(array(
       "Event_title" => $name,
       "Event_desc" => $desc,
       "Event_start_date" => $start_date,
       "Event_end_date" => $end_date,
       'Event_type' => $event_type,
       'Event_expected_guest' => $guest_name,
       'CreatedBy' =>  1,
       'Created_datetime' => date("Y-m-d H:i:s", time()),
       'Is_Active' => 1,
       'User_id' => 1, 
       'Vendor_id' => 1,
       )
    );

    
} 

public function update_event() 
{
	
    /* Our calendar data */
    $name = $this->input->post("title", TRUE);
    $desc = $this->input->post("content_event", TRUE);
    $start_date = $this->input->post("start", TRUE);
    $end_date = $this->input->post("end", TRUE);
    $event_type = $this->input->post("event_type", TRUE);
    $guest_name = $this->input->post("guest_name", TRUE);
    $id = $this->input->post("id", TRUE);
    // if(!empty($start_date)) {
    //    $sd = DateTime::createFromFormat("Y-m-d", $start_date);
    //    $start_date = $sd->format('Y-m-d H:i:s');
    //    $start_date_timestamp = $sd->getTimestamp();
    // } else {
    //    $start_date = date("Y-m-d H:i:s", time());
    //    $start_date_timestamp = time();
    // }

    // if(!empty($end_date)) {
    //    $ed = DateTime::createFromFormat("Y-m-d", $end_date);
    //    $end_date = $ed->format('Y-m-d H:i:s');
    //    $end_date_timestamp = $ed->getTimestamp();
    // } else {
    //    $end_date = date("Y-m-d H:i:s", time());
    //    $end_date_timestamp = time();
    // }

  //   $this->events_model->update_event($id, array(
  //      "title" => $name,
  //      "description" => $desc,
  //      "start" => $start_date,
  //      "end" => $end_date,
  //      'event_type' => $event_type,
  //      'event_expected_guest' => $guest_name,
	 //   'modified_by' => 2,
	 //   'modified_date' => date("Y-m-d H:i:s", time()),,

		// )
  //   );

$this->events_model->update_event($id, array(
                    "title" => $name,
                    "description" => $desc,
                    // "start" => $start_date,
                    // "end" => $end_date,
					// 'event_type' => $event_type,
					'event_expected_guest' => $guest_name,
					'modified_by' => 2,
					'modified_date' => date("Y-m-d H:i:s", time()),
                    )
               );    

    
}

	public function index()
	{
    //var_dump($this->session->userdata());
    //exit();
		$this->load->view('events/index.php');
	}
	
	public function save(){
	
	  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $title = isset($request->title) ? strip_tags($request->title) : '';
    $place = isset($request->place) ? strip_tags($request->place) : '';
    $content_event = isset($request->content_event) ? strip_tags($request->content_event) : '';
    $start = isset($request->start) ? strip_tags($request->start) : '';
    $end = isset($request->end) ? strip_tags($request->end) : '';
    /*
    $insert = $this->book_model->book_add($data);
			$data = array(
					'book_isbn' => $title,
					'book_title' => $content_event,
					'book_author' => $start,
					'book_category' => $end,
				);    
			echo json_encode(array("status" => TRUE));
			*/
    $client = new Google_Client();
    $client->setApplicationName("Client_Library_Examples");
    $client->setDeveloperKey("AIzaSyBMXKH-Kgzdlqlncn8FMq9sQZlcBVqqvrQ");
    $client = $this->getClient();
    print_r($client);
try {
if ($client) {
        throw new Exception('Test error', 123);
    }
    echo json_encode(array(
        'result' => 'vanilla!',
    ));
}catch (Exception $e) {
    print_r($e->getMessage());

    $client_id = '12345467-123azer123aze123aze.apps.googleusercontent.com'; // YOUR Client ID
    $service_account_name = '12345467-123azer123aze123aze@developer.gserviceaccount.com'; // Email Address in the console account

    $key_file_location = 'fullcalendar/google-api-php-client-master/API_Project-35c93db58757.p12'; // key.p12 to create in the Google API console

    if (strpos($client_id, "googleusercontent") == false || !strlen($service_account_name) || !strlen($key_file_location)) {
        echo "no credentials were set.";
        exit;
    }
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}

die();
    /** We create service access ***/
    $client = new Google_Client();  

    /************************************************
    If we have an access token, we can carry on.  (Otherwise, we'll get one with the help of an  assertion credential.)
    Here we have to list the scopes manually. We also supply  the service account
     ************************************************/
    if (isset($_SESSION['service_token'])) {
            $client->setAccessToken($_SESSION['service_token']);
    }
    $key = file_get_contents($key_file_location);
    $cred = new Google_Auth_AssertionCredentials(
        $service_account_name,
    array('https://www.googleapis.com/auth/calendar'), // ou calendar_readonly
    $key
);

    $client->setAssertionCredentials($cred);
    if ($client->getAuth()->isAccessTokenExpired()) {
        $client->getAuth()->refreshTokenWithAssertion($cred);
    }
    $_SESSION['service_token'] = $client->getAccessToken();


    $service = new Google_Service_Calendar($client);
    $calendarId = '6ao3l2asps4e6qo2ne6qip04kg@group.calendar.google.com';
    
    $event = new Google_Service_Calendar_Event(array(
            'summary' => $title, 
            'location' => $place,
            'description' => $content_event,
            'start' => array(
                'dateTime' => $start, //'2015-06-08T15:00:00Z'
                'timeZone' => 'Europe/Paris',
            ),
            'end' => array(
                'dateTime' => $end,
                'timeZone' => 'Europe/Paris',
            ),
            /* in case you need that :
            'attendees' => array(
                array('email' => 'lpage@example.com'),
                array('email' => 'sbrin@example.com'),
            ),*/
            'reminders' => array(
                'useDefault' => FALSE,
                'overrides' => array(
                    array('method' => 'email', 'minutes' => 20)
            ),
                ),
    ));

  $event = $service->events->insert($calendarId, $event);
  printf('Event created: %s', $event->htmlLink);
			
	}
	public function update(){
		  $postdata = file_get_contents("php://input");
	  print_r($this->input->post('content_event'));
	}	
	
	  public function getClient()
  {
      $client = new Google_Client();
      $client->setApplicationName('Google Calendar API PHP Quickstart');
      $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
      $client->setAuthConfig(FCPATH.'google/credentials.json');
      $client->setAccessType('offline');
      $client->setPrompt('force');
      // Load previously authorized token from a file, if it exists.
      $tokenPath = FCPATH.'google/token.json';
      if (file_exists($tokenPath)) {
          $accessToken = json_decode(file_get_contents($tokenPath), true);
          $client->setAccessToken($accessToken);
      }
      // If there is no previous token or it's expired.
      if ($client->isAccessTokenExpired()) {
          // Refresh the token if possible, else fetch a new one.
          if ($client->getRefreshToken()) {
              $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
          } else {
              // Request authorization from the user.
              $authUrl = $client->createAuthUrl();
              printf("Open the following link in your browser:\n%s\n", $authUrl);
              print 'Enter verification code: ';
              $authCode = trim(fgets(STDIN));
              // Exchange authorization code for an access token.
              $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
              $client->setAccessToken($accessToken);
              // Check to see if there was an error.
              if (array_key_exists('error', $accessToken)) {
                  throw new Exception(join(', ', $accessToken));
              }
          }
          // Save the token to a file.
          if (!file_exists(dirname($tokenPath))) {
              mkdir(dirname($tokenPath), 0700, true);
          }
          file_put_contents($tokenPath, json_encode($client->getAccessToken()));
      }
      return $client;
    }
}

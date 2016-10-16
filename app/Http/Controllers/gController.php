<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Illuminate\Http\Request;

class gController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
            $calendarId = 'primary';
            // $calendarId = 'webdevmatics@gmail.com';
            $optParams = array(
                'maxResults' => 10,
                'orderBy' => 'startTime',
                'singleEvents' => true,
                'timeMin' => date('c'),
            );
            $results = $service->events->listEvents($calendarId, $optParams);

            if (count($results->getItems()) == 0) {
                print "No upcoming events found.\n";
            } else {
                print "Upcoming events:\n";
                foreach ($results->getItems() as $event) {
                    $start = $event->start->dateTime;
                    if (empty($start)) {
                        $start = $event->start->date;
                    }
                    printf("%s (%s)\n", $event->getSummary(), $start);
                    echo "<br>";
                }
            }

        } else {
//             $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
//             header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            return redirect('/oauth');
        }

    }

    public function oauth()
    {
        session_start();
        $rurl = action('gController@oauth');
        $client = new Google_Client();
        $client->setAuthConfigFile('client_secret.json');
        $client->setRedirectUri($rurl);
        $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
//            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            return redirect('/cal');
//            $redirect_uri             = 'http://' . $_SERVER['HTTP_HOST'] . '/';
//            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

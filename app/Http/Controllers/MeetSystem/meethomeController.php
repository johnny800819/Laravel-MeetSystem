<?php
namespace App\Http\Controllers\MeetSystem;
/** laravel framework **/
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/** project **/
use App\Http\Requests;
use App\Http\Controllers\Controller;
/** model **/
use App\Models\Meeting\CalendarFeedModel;
use App\Models\Meeting\MeetModel;
use App\Models\another_lib\NamedFunction;
/** ajax must **/
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request as Facades_Request;
use Illuminate\Http\RedirectResponse;
class meethomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tt = array();
        $tt['usr_email'] = Auth::user()->email;
        return view('MeetView.MeetHomeView', compact('tt'));
    }
    public function calendarfeed()
    {
        // the "all" function that return is an array
        $calendarfeed = CalendarFeedModel::all();
        try 
        {
            $events = array();
            $e = array();
            foreach($calendarfeed as $data)
            {
                $e['id'] = $data->mt_id;
                $e['title'] = $data->mt_name;
                $e['start'] = $data->mt_date;
                $e['endtime'] = $data->mt_date;
                $e['allDay'] = false;
                // Merge the event array into the return array
                array_push($events, $e);
            }
            // Output json for our calendar
            echo json_encode($events);
            exit();
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rechaptcha = new NamedFunction;
        $site_key = $rechaptcha->get_key('site');
        $data = array(
            'site_key' => $site_key
        );
        if ($request->isMethod('get')) {
            return view('MeetView.MeetCreateView')->with($data);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* case1
        $user_name = Auth::user()->name;
        */

        /* case2
        $request->all(),this is an array
        */
        $info = $request->all();
        $site_response = $info['g-recaptcha-response'];

        /* 1.verify the rechaptcha
        */
        $rechaptcha = new NamedFunction;
        $bool = $rechaptcha->verify($site_response);
        if(!$bool){
            return redirect()->route('new_meet',  ['error_msg' => 'Please Enter ReCaptcha']);
        }

        /* 2.verify the form data
        */
        $error_occur = false;
        foreach ($info as $value) {
            if($value == '') {
                $error_occur = true; 
                break; 
            } 
        }
        if($error_occur) {
            return redirect()->route('new_meet',  ['error_msg' => 'Please Enter Full Information']);
        }

        $meet_model = new MeetModel;
        $meet_model->save_meet_event($info);
        $meet_model->save_meet_member($info);

        return redirect('meethome');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function get_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $meet_model = new MeetModel;
            $user_info = $meet_model->get_user_info();
            return $user_info;
        }
    }
}
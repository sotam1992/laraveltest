<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Appointment;
use App\User;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $appointment = $this->getAppointment();
        
        return view('admin.appointment.appointment', ['data'=>$appointment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $doctorList = User::find($id);
        return view('admin.appointment.addAppointment',['data' => $doctorList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'appointment_date'=>'required',
         'appointment_time'=>'required',
         'doctor_id'=>'required'
      ]);
        $request->merge([ 
                'user_id' => Auth::user()->id    
            ]);
        unset($request['_token']);
        $asset = Appointment::create($request->all());
        $appointment = $this->getAppointment();
        //print_r($appointment); die;
        return redirect('/admin/appointment')->with('data', $appointment)->with('success', 'Record add successfully');
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
        $data['appointment'] = $this->getAppointment($id);
        $data['doctorList'] = User::all()->where('role', 'Doctor');
        //print_r($data); die;
        return view('admin.appointment.editAppointment', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = $request->id;
        $this->validate($request,[
         'appointment_date'=>'required',
         'appointment_time'=>'required',
         'doctor_id'=>'required',
         'id' => 'required'
      ]);
        unset($request['_token'],$request['id']);
        Appointment::where('id', $id)
          ->update($request->all());
        $appointment = $this->getAppointment();
        return redirect('/admin/appointment')->with('data', $appointment)->with('success', 'Record Update successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $appointment = Appointment::find($id);
       $appointment->delete();
       $appointment = $this->getAppointment();
        return redirect('/admin/appointment')->with('data', $appointment)->with('success', 'Record delete successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialist()
    {
        $doctorList = DB::table('users')->where('role', 'Doctor')->paginate(2);
        return view('admin.appointment.specialist',['data' => $doctorList]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchSpecialist(Request $request)
    {

        $doctorList = DB::table('users')->where('role', 'Doctor')->where('designation', $request->designation)->paginate(2);
        return view('admin.appointment.specialist',['data' => $doctorList]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAppointment($id='')
    {
        $currentuserid = Auth::user()->id;
        $currentuserrole = Auth::user()->role;
        if($id !=''){
            $appointments =DB::table('appointments')
                ->join('users as paitent', 'paitent.id', '=', 'appointments.user_id')
                ->join('users as doctor', 'doctor.id', '=', 'appointments.doctor_id')
                ->select('paitent.id as patient_id','paitent.name as patient_name','doctor.id as doctor_id','doctor.name as doctor_name','paitent.mobile as paitent_mobile','doctor.mobile as doctor_mobile','doctor.designation','appointments.appointment_date','appointments.appointment_time', 'appointments.id')
                ->where('appointments.user_id', $currentuserid)
                ->where('appointments.id', $id)
                ->first();
        }
        else{
            if($currentuserrole == 'Patient'){
            $appointments =DB::table('appointments')
                ->join('users as paitent', 'paitent.id', '=', 'appointments.user_id')
                ->join('users as doctor', 'doctor.id', '=', 'appointments.doctor_id')
                ->select('paitent.id as patient_id','paitent.name as patient_name','doctor.id as doctor_id','doctor.name as doctor_name','paitent.mobile as paitent_mobile','doctor.mobile as doctor_mobile','doctor.designation','appointments.appointment_date','appointments.appointment_time', 'appointments.id')
                ->where('appointments.user_id', $currentuserid)
                ->paginate(2);
        }else{
            $appointments =DB::table('appointments')
                ->join('users as paitent', 'paitent.id', '=', 'appointments.user_id')
                ->join('users as doctor', 'doctor.id', '=', 'appointments.doctor_id')
                ->select('paitent.id as patient_id','paitent.name as patient_name','doctor.id as doctor_id','doctor.name as doctor_name','paitent.mobile as paitent_mobile','doctor.mobile as doctor_mobile','doctor.designation','appointments.appointment_date','appointments.appointment_time', 'appointments.id')
                ->where('appointments.doctor_id', $currentuserid)
                ->paginate(2);
        }
        }
        return $appointments;
    }
}

<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\PropetyModel;
use App\Models\Ace\UserModel;
use App\Models\Ace\AppointmentModel;
use App\Models\Ace\ClientModel;
class Analytics extends Controller
{
  public function index()
  {
    $role=session()->get('role');
    $id=session()->get('id');
    $totalproperty = PropetyModel::count();
    $activeproperty=PropetyModel::where('status','1')->count();
    $Rent=PropetyModel::where('purpose','Rent')->where('status','1')->count();
    $Buy=PropetyModel::where('purpose','Buy')->where('status','1')->count();
    $user = UserModel::where('status','1')->count();
    $from_date=date("Y-m-d");
    
    if($role == 'Agent')
    {
      $PendingAppointments = AppointmentModel::where('userId',$id)->where('status',20)->count();
    }
   else
    {
      $PendingAppointments = AppointmentModel::where('status',20)->count();

    }

    if($role == 'Agent')
    {
      $todaysAppointments = AppointmentModel::where('date', '=', $from_date)->where('userId',$id)->where('status','!=',23)->orderBy('id', 'DESC')->get();
    }
    else{
      $todaysAppointments = AppointmentModel::where('date', '=', $from_date)->where('status','!=',23)->orderBy('id', 'DESC')->get();
    }

    foreach($todaysAppointments as $row)
    {
      $cData = ClientModel::where('id',$row->client_id)->get();
      $row['clientName'] = $cData[0]->first_name .' '.  $cData[0]->last_name;
    $countProperty = PropetyModel::where('id',$row->propertyId)->get();
      if(count($countProperty) != 0){
        $row['propertyName'] = PropetyModel::where('id',$row->propertyId)->get()[0]->name;
      }else{
        $row['propertyName'] = '';
      }
      $aData = UserModel::where('id',$row->userId)->get();
      $row['agentName'] = $aData[0]->first_name .' '.$aData[0]->last_name; 
    }
    return view('content.dashboard.dashboards-analytics')->with('totalproperty',$totalproperty)->with('activeproperty',$activeproperty)->with('user',$user)->with('PendingAppointments',$PendingAppointments)->with('todaysAppointments',$todaysAppointments)->with('Buy',$Buy)->with('Rent',$Rent);
  }
}
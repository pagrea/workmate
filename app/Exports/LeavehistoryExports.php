<?php
use Illuminate\Support\Facades\Session;

namespace App\Exports;

use App\Leaverequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
class LeavehistoryExports implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('search1');
        $startDate2=\Session::get('startDate1');
        $endDate2=\Session::get('endDate1');

       if ($Search2 !="" && $startDate2 =="" ){

        $leaverequest = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
        ->where('users.FirstName','LIKE', '%' . $Search2 . '%')
        ->orWhere('leaverequests.EmployeeID', auth::user()->EmployeeID)
        ->where('users.LastName','LIKE', '%' . $Search2 . '%')
        ->orderBy('leaverequests.id', 'DESC')
            ->select(   'leaverequests.id',
                        'leaverequests.EmployeeID',
                        'FirstName',
                        'LastName',
                        'StartDate',
                        'DaysApproved',
                        'EndDate',
                        'TypeOfLeave',
                        'RequestStatus')
            ->get();
            return $leaverequest;
        }

        elseif ($Search2 =="" && $startDate2 !="" ){
            $leaverequest = \DB::table('users')->
            join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
            ->where('leaverequests.StartDate','>=', $startDate2)
            ->where('leaverequests.StartDate','<=', $endDate2)
            ->orderBy('leaverequests.id', 'DESC')
            ->select(   'leaverequests.id',
                        'leaverequests.EmployeeID',
                        'FirstName',
                        'LastName',
                        'StartDate',
                        'DaysApproved',
                        'EndDate',
                        'TypeOfLeave',
                        'RequestStatus')
            ->get();
                return $leaverequest;
            }
            elseif ($Search2 !="" && $startDate2 !="" ){
                $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->where('leaverequests.StartDate','>=', $startDate2)
                ->where('leaverequests.StartDate','<=', $endDate2)
                ->where('leaverequests.TypeOfLeave','LIKE', '%' . $Search2 . '%')
                ->orderBy('leaverequests.id', 'DESC')
                ->select(   'leaverequests.id',
                            'leaverequests.EmployeeID',
                            'FirstName',
                            'LastName',
                            'StartDate',
                            'DaysApproved',
                            'EndDate',
                            'TypeOfLeave',
                            'RequestStatus')
                ->get();
                return $leaverequest;
        }else{

            $leaverequest = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.EmployeeID', auth::user()->EmployeeID)
                ->orderBy('leaverequests.id', 'DESC')
                ->select(   'leaverequests.id',
                            'leaverequests.EmployeeID',
                            'FirstName',
                            'LastName',
                            'StartDate',
                            'DaysApproved',
                            'EndDate',
                            'TypeOfLeave',
                            'RequestStatus')
                ->get();
            return $leaverequest;
    }
    }

    public function headings(): array
    {
        return [
                    'RequestId',
                    'EmployeeID',
                    'FirstName',
                    'LastName',
                    'StartDate',
                    'DaysApproved',
                    'EndDate',
                    'TypeOfLeave',
                    'RequestStatus'
        ];
    }

}

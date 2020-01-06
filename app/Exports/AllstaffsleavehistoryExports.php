<?php
use Illuminate\Support\Facades\Session;

namespace App\Exports;

use App\Leaverequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
class AllstaffsleavehistoryExports implements FromCollection, WithHeadings, ShouldAutoSize
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
        $leaverequests = \DB::table('users')->
        join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
        ->where('leaverequests.EmployeeID','LIKE', '%' . $Search2 . '%')
        ->where('users.Department','!=', 'Not Available')
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
            return $leaverequests;

        } elseif ($Search2 =="" && $startDate2 !="" ){
            $leaverequests = \DB::table('users')->
            join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->where('leaverequests.StartDate','>=', $startDate2)
            ->where('leaverequests.StartDate','<=', $endDate2)
            ->where('users.Department','!=', 'Not Available')
            ->orderBy('leaverequests.EmployeeID', 'DESC')
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
               return $leaverequests;

            }
            elseif ($Search2 !="" && $startDate2 !="" ){
                $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.StartDate','>=', $startDate2)
                ->where('leaverequests.StartDate','<=', $endDate2)
                ->where('users.EmployeeID','LIKE', '%' . $Search2 . '%')
                ->where('users.Department','!=', 'Not Available')
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
                       return $leaverequests;
        }else{
            $leaverequests = \DB::table('users')->
                join('leaverequests' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('users.Department','!=', 'Not Available')
                ->orderBy('FirstName')
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
            return $leaverequests;
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

<?php
use Illuminate\Support\Facades\Session;

namespace App\Exports;

use App\Leaverequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
class DepartmentalleavehistoryExports implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 ==""){
            $leaverequest = \DB::table('leaverequests')->
                join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
                ->where('leaverequests.DepartmentID', auth::user()->Department)
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
            return $leaverequest;
        }else{
            $leaverequest = \DB::table('leaverequests')->
            join('users' , 'leaverequests.EmployeeID' , '=','users.EmployeeID')
            ->where('leaverequests.DepartmentID', auth::user()->Department)
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

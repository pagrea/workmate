<?php
use Illuminate\Support\Facades\Session;

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
class StaffinfoExports implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('Search1');
        if ($Search2 !=""){
            $staffs =User::where('id','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('EmployeeID','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('FirstName','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('LastName','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')
            
            ->orWhere('highest_education_level','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('Gender','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('JobTitle','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('MaritalStatus','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('Nationality','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('NationalIDNum','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('highest_education_level','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')

            ->orWhere('email','LIKE', '%' . $Search2 . '%')
            ->where('Department','!=', 'Not Available')
            ->orderBy('FirstName')
            ->select(   'id',
                        'EmployeeID',
                        'FirstName',
                        'LastName',
                        'Dob',
                        'Gender',
                        'JobTitle',
                        'highest_education_level',
                        'DateOfEmployment',
                        'DateOfLastPromotion',
                        'MaritalStatus',
                        'LeaveBalance',
                        'Nationality',
                        'NationalIDNum',
                        'BirthCertificateNum',
                        'CurrentStatus',
                        'Department',
                        'AbsorbedInNIMR',
                        'UserRole',
                        'email',
                        'OtherEmail',
                        'PhoneNumber',
                        'EmegencyContantPerson',
                        'EmegencyContactNumber',
                        'StaffCurrentAddress',
                        'StaffHomeAddress',
                        'updated_at',
                        'UpdatedBy',
            )
            ->get();
            return $staffs;
        }else{
            $staffs =User::where('Department','!=', 'Not Available')
            ->orderBy('FirstName')
            ->select(   'id',
                        'EmployeeID',
                        'FirstName',
                        'LastName',
                        'Dob',
                        'Gender',
                        'JobTitle',
                        'highest_education_level',
                        'DateOfEmployment',
                        'DateOfLastPromotion',
                        'MaritalStatus',
                        'LeaveBalance',
                        'Nationality',
                        'NationalIDNum',
                        'BirthCertificateNum',
                        'CurrentStatus',
                        'Department',
                        'AbsorbedInNIMR',
                        'UserRole',
                        'email',
                        'OtherEmail',
                        'PhoneNumber',
                        'EmegencyContantPerson',
                        'EmegencyContactNumber',
                        'StaffCurrentAddress',
                        'StaffHomeAddress',
                        'updated_at',
                        'UpdatedBy',
                        )
            ->get();
            return $staffs;
    }
    }

    public function headings(): array
    {
        return [    'id',
                    'EmployeeID',
                    'FirstName',
                    'LastName',
                    'Dob',
                    'Gender',
                    'JobTitle',
                    'highest_education_level',
                    'DateOfEmployment',
                    'DateOfLastPromotion',
                    'MaritalStatus',
                    'LeaveBalance',
                    'Nationality',
                    'NationalIDNum',
                    'BirthCertificateNum',
                    'CurrentStatus',
                    'Department',
                    'AbsorbedInNIMR',
                    'UserRole',
                    'email',
                    'OtherEmail',
                    'PhoneNumber',
                    'EmegencyContantPerson',
                    'EmegencyContactNumber',
                    'StaffCurrentAddress',
                    'StaffHomeAddress',
                    'updated_at',
                    'UpdatedBy'
        ];
    }

}

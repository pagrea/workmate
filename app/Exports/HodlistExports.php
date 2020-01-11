<?php
use Illuminate\Support\Facades\Session;
namespace App\Exports;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
class HodlistExports implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $Search2=\Session::get('search1');
        if ($Search2 !=""){
            $staffs =User::where('FirstName','LIKE', '%' . $Search2 . '%')
            ->where('UserRole', 'Hod')
            ->where('Department','!=', 'Not Available')
            
            ->orWhere('LastName','LIKE', '%' . $Search2 . '%')
            ->where('UserRole', 'Hod')
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
                        'UpdatedBy'
            )
            ->get();
            return $staffs;
        }else{
            $staffs1 =User::where('Department','!=', 'Not Available')
            ->where('UserRole', 'Hod')
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
                        'UpdatedBy'
                        )
            ->get();
            return $staffs1;
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

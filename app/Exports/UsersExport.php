<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('store')->where('role', '<>', 'admin')->get();
    }

    public function map($user): array
    {	
    	if ($user->store_id != null) {
	    	return [
	    		$user->username,
	    		$user->email,
	            $user->name,
	            $user->store_id,
	    		$user->store->name,
	    	];
   		} else {
   			return [
	    		$user->username,
	    		$user->email,
	            $user->name,
	            $user->store_id,
	    	];
   		}
    }
    
    public function headings(): array
    {
        return [
            'Tài khoản',
            'Email',
            'Tên quản lý',
            'Id kho quản lý',
            'Tên kho quản lý',
        ];
    }
}

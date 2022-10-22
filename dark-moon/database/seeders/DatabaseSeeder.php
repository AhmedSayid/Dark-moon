<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Constants\UserTypes ;
use App\Models\User;
use App\Models\Service;
use App\Models\Branch;
use App\Models\BranchService;
use App\Models\Query;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            'name'    => 'admin',
            'phone'    => '0109874919999',
            'address'    => 'xxst-elsultan huseein',
            'email'         => 'admin@portfolio.com',
            'password'      => Hash::make('admin@portfolio.com'),
            'type'          => UserTypes::ADMIN,
            'active'          => 1,
        ];
        User::create($user);
//
        // $branch=[
        //     'name'    => 'Branch one',
        //     'phone_one'    => '0109874919999',
        //     'lat'    => '22.2352441541',
        //     'lng'    => '23.2352441541',
        //     'address'    => 'xxst-elsultan huseein',
        //     'phone_two'         => '01098749192',
        //     'active'          => 1,
        // ];
        // $branch = Branch::create($branch);


        // $parentService=[
        //     'name'    => 'parent Service one',
        //     'parent_id'    => null,
        //     'video'    => '/swdsdf/sdsd/sd/sd/s/ds/d/sds/s',
        //     'cover_image'    => 'xxst-elsultan huseein',
        //     'image'         => '/public/sdfsdf/sdf/sdf/sd/f',
        //     'detail'         => 'h hhhhhhhhhhhhhhhhhhhhhhhhhhhh h hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh',
        //     'active'          => 1,
        // ];
        // $parentService = Service::create($parentService);

        // $childService=[
        //     'name'    => 'child Service one',
        //     'parent_id'  => $parentService->id ,
        //     'video'    => '/swdsdf/sdsd/sd/sd/s/ds/d/sds/s',
        //     'cover_image'    => 'ccccc-elsultan huseein',
        //     'image'         => '/public/sdsd/d/sd/sd/sd/s/d/s',
        //     'details'         => 'h hhhhh',
        //     'active'          => 1,
        // ];

        // $childService = Service::create($childService);

        // BranchService::create(['branch_id'=> $branch->id, 'service_id'=>$parentService->id , 'price'=> '10']);
        // BranchService::create(['branch_id'=> $branch->id, 'service_id'=>$childService->id , 'price'=> '10']);
        // //
        // $query=[
        //     'type'    => 1,
        //     'name'    => 'ahmed',
        //     'text'    => 'kdjldjldjklld',
        //     'email'    => 'aaaaa@yahoo.com',
        //     'phone'    => '014646+5+5+6',
        //     'file'  => 'sss/s//ss//f',
        //     'branch_id'  => 1,
        //     'service_id'  => 1,
        // ];
        // $query = Query::create($query);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->ajax()) {



            // $userQuery = User::query();

            // if ($request->date) {

            //     $userQuery->leftJoin('newsletter_user' , 'users.id' , 'newsletter_user.user_id')
            //     ->select(['users.name' , 'users.last_name' , 'users.dob' , 'users.email' ,DB::raw('COUNT(newsletter_user.inscription)')])
            //     ->whereDate('newsletter_user.updated_at' ,  $request->date)
            //     ->where('newsletter_user.inscription' , User::SUBSCRIBE)
            //     ->groupBy('users.id')
            //     ->get();
            // }

            return DataTables::of(User::query())

                ->filter(function ($query) use ($request) {

                    if ($request->name) {
                        $query->where('name', 'like', "%{$request->name}%")
                            ->orWhere('last_name', 'like', "%{$request->name}%");
                    }

                    if ($request->email) {

                        $query->where('email', 'like', "%{$request->email}%");
                    }


                    if($request->date){

                        //date
                    }
                  
                })
                ->addColumn('action', 'dashboard.admin.cruds.inscrit.action')

                ->addColumn('full_name', function ($user) {
                    return "$user->name $user->last_name";
                })

                ->addColumn('newsletters', function ($user) {
                    return $user->newsletters()->where('inscription', User::SUBSCRIBE)->count();
                })
                ->rawColumns(['action'])

                ->toJson();
        }

        return view('dashboard.admin.cruds.inscrit.filter');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}

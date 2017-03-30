<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ManagerData;

class ProfileController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $firstname = "";
        $lastname = "";
        $postcode = "";
        $city = "";
        $street = "";
        $phone = "";
        $managerdata = "";

        if(ManagerData::where("user_id", Auth::id())->count() > 0)
        {
            $managerdata = ManagerData::where("user_id", Auth::id())->first();

            $firstname = $managerdata->firstname;
            $lastname = $managerdata->lastname;
            $postcode = $managerdata->postcode;
            $city = $managerdata->city;
            $street = $managerdata->street;
            $phone = $managerdata->phone;
        }

        return view('profile\profile', [
            "firstname"=>$firstname,
            'lastname'=> $lastname,
            'postcode'=> $postcode,
            'city'=> $city,
            'street' => $street,
            'phone' => $phone
        ]);
    }

    public function edit(Request $request)
    {
        /**
         * without this laravel would allow multiple requests to be sent
         * simply by clicking "add/edit" button multiple times
         * it introduces delay in adding and editing so it prevents spam
         **/
        if(isSpam($request, "addArtistSpam")){
            return redirect()->back()->withErrors(["spam" => "you will have to wait 10s to edit profile"]);
            die();
        }
        $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'postcode' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'street' => 'required|string|max:255',
                'phone' => 'required|numeric|max:255',
            ]
            );
        $managerdata = "";

        $firstname = $request->input("firstname", "");
        $lastname = $request->input("lastname", "");
        $postcode = $request->input("postcode", "");
        $city = $request->input("city", "");
        $street = $request->input("street", "");
        $phone = $request->input("phone", "");

        if(ManagerData::where("user_id", Auth::id())->count() == 0)
            $managerdata = new ManagerData;
        elseif(ManagerData::where("user_id", Auth::id())->count() > 0)
            $managerdata = ManagerData::where("user_id", Auth::id())->first();

        $managerdata->firstname = $firstname;
       $managerdata->lastname = $lastname;
       $managerdata->postcode = $postcode;
       $managerdata->city = $city;
       $managerdata->street = $street;
       $managerdata->phone = $phone;
       $managerdata->user_id = Auth::id();

        $managerdata->save();


        return redirect()->route("profile");
    }
}

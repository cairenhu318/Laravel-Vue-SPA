<?php

namespace Laraspace\Http\Controllers;

use Illuminate\Http\Request;
use Laraspace\Contact;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return $contacts = Contact::with(['labels'])->get();

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
               
        $contact = new Contact;
        $contact->name = $request->contact['name'];
        $contact->phone = $request->contact['phone'];
        $contact->address = $request->contact['address'];
        $contact->email = $request->contact['email'];
        $contact->dob = $request->contact['dob'];
        $contact->url = $request->contact['url'];
        $contact->save();
        $contact->labels()->sync($request->labels);

        return $contact;

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
        
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->dob = $request->dob;
        $contact->url = $request->url;
        $contact->save();
        $contact->labels()->sync($request->labels);
        return $contact;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $label = Cotntact::find($id);
        $label->delete();

        return "success";

    }
    public function ImageStore ()
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img/contacts/'), $imageName);
            $imagePath = 'assets/img/contacts/' . $imageName;
            $contact->image = $imagePath;
        }
    }

}

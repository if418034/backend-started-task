<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Internship::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'location' => 'required',
            'time_length' => 'required'
        ]);

        return Internship::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Internship::find($id);
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
        $internship = Internship::find($id);

        $internship->update($request->all());

        return $internship;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Internship::destroy($id);
    }

    /**
     * Search for internship name
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Internship::where('name', 'like', '%'.$name.'%')->get();
    }

    /**
     * Display a listing of agencies
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perAgency($name)
    {
        return Internship::join('agencies', 'internships.agency_id', '=', 'agencies.id')
            ->where('agencies.name', 'like' , '%'.$name.'%')->get();
    }
}

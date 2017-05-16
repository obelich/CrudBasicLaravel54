<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    protected $person;
    protected $user;

    public function __construct(Person $person)
    {
        $this->person = $person;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $people = $this->person->all();
        return view('contacts.index')->with('people', $people);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' =>  $this->user->id]);


        $person = $this->person->create($request->all());
        if ($request->photo)
        {
            $archivo =  $this->uploadFile($request->photo, $this->user, 'contacts');
            $person->update(['photo' =>  $archivo]);
        }
        $person->telephones()->create($request->all());

        return redirect()->route('contacts.index');

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

    public static function uploadFile($file, $user, $directory)
    {

        $name = str_replace(' ','_',strtolower($user['name'])).
            '_'.date('Ymd') . rand(1	, 15).
            '.'.$file->getClientOriginalExtension();

        if (!is_dir('upload/'.$directory))
        {
            mkdir('upload/'.$directory, 0777, true);
        }

        $file->move('upload/'.$directory.'/'.$user['id'].'/', $name);

        $nombre_fichero ='upload/'. $directory.'/'.$user['id'].'/'.$name;

        return $nombre_fichero;

    }
}

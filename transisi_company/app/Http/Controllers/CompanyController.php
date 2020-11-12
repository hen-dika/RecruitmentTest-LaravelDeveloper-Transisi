<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        return view('pages.company.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $this->validate($request, [
            'logo' => 'required',
        ]);
        
        $getVar = $request->all();
        $getVar['logo'] = $request->file('logo')->store('company','public');
        
        Company::create($getVar);

        return redirect()->route('company.index');
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
        $company = Company::findOrFail($id);

        return view('pages.company.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);

        if ($request->file('logo') == "") {
            $getVar = $request->all();
            $company->update($getVar);
        } else {
            $this->validate($request, [
                'logo' => 'required',
            ]);
            Storage::disk('local')->delete('public/'.$company->logo);

            $getVar = $request->all();
            $getVar['logo'] = $request->file('logo')->store('company','public');

            $company->update($getVar);
        }

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company -> delete();

        return redirect()->route('company.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::paginate(5);

        return view('company.list',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
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
        $this->validate($request,[
            'name'      =>  'required',
            'email'     =>  'required',
            'website'   =>  'required',
            'logo'      =>  'required||mimes:png|max:2048|dimensions:min_width=100,min_height=100',
        ],[
            'name.required'     => 'Nama Perusahaan Wajib Diisi!',
            'email.required'    => 'Alamat Email Wajib Diisi!',
            'website.required'  => 'Website Wajib Diisi!',
            'logo.required'     => 'Logo Wajib Diisi!',
            'logo.mimes'        => 'Format Logo Harus PNG',
            'logo.max'          => 'Ukuran Logo Maksimal 2Mb!',
            'logo.dimensions'   => 'Dimensi Logo Minimal 100x100 pixels!'
        ]);
        
        $logo = str_slug($request->name, '-');
                
        $company = Company::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'website'   =>  $request->website,
            'logo'      =>  'logo-'.$logo.'.png',
            ]);
            
        //beri nama file
    	$logoName = 'logo-'.$logo.'.'.
    	//ambil file sesuai aslinya
        $request->file('logo')->getClientOriginalExtension();
        //masukan file kefolder
	    $request->file('logo')->move(
	        base_path() . '/public/storage/app/company', $logoName
        );
        
        return back()->with('success','Data berhasil disimpan!');
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
        $company = Company::whereId($id)->first();

        return view('company.edit',compact('company'));
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
        $this->validate($request,[
            'name'      =>  'required',
            'email'     =>  'required',
            'website'   =>  'required',
        ],[
            'name.required'     => 'Nama Perusahaan Wajib Diisi!',
            'email.required'    => 'Alamat Email Wajib Diisi!',
            'website.required'  => 'Website Wajib Diisi!'
        ]);
        
        $company = Company::find($id);
        if ($request->logo != null) {
            $this->validate($request,[
                'logo'      =>  'required||mimes:png|max:2000|dimensions:min_width=100,min_height=100',
            ],[
                'logo.required'     => 'Logo Wajib Diisi!',
                'logo.mimes'        => 'Format Logo Harus PNG',
                'logo.max'          => 'Ukuran Logo Maksimal 2Mb!',
                'logo.dimensions'   => 'Dimensi Logo Minimal 100x100 pixels!'
            ]);
            $logo = str_slug($request->name, '-');
            $logoSave = 'logo-'.$logo.'.png';
            //beri nama file
            $logoName = 'logo-'.$logo.'.'.
            //ambil file sesuai aslinya
            $request->file('logo')->getClientOriginalExtension();
            //masukan file kefolder
            $request->file('logo')->move(
                base_path() . '/public/storage/app/company', $logoName
            );
        }
        
        $company->update([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'website'   =>  $request->website,
            'logo'      =>  ($request->logo != null) ? $logoSave : $company->logo ,
        ]);
        
        return back()->with('success','Data berhasil dirubah!');
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
        $company = Company::find($id);
        $company->delete();
        return back()->with('success','Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNI;
use App\Models\Kecamatan;
use App\Models\PAM;
use Illuminate\Http\Request;

class PamController extends Controller
{
    protected $customMessages = [
        'required' => 'Please input the :attribute.',
        'unique' => 'This :attribute has already been taken.',
        'max' => ':Attribute may not be more than :max characters.',
        'biodata_id.required' => 'Please select Districts.',
        'kecamatan_id.required' => 'Please select Districts.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(PAM::with('kecamatan', 'biodata')
                ->orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('biodata', 'admin.pam.biodata')
                ->addColumn('kecamatan', 'admin.pam.kecamatan')
                ->addColumn('action', 'admin.pam.action')
                ->rawColumns(['biodata', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        $kecamatan  = Kecamatan::orderBy('name')->get();
        $biodata    = BiodataWNI::orderBy('name')->get();
        return view('admin.pam.index', compact('kecamatan', 'biodata'));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        request()->validate([
            'biodata'       => 'nullable|integer|exists:biodata_w_n_i_s,id',
            'locus'         => 'required|string',
            'kecamatan'     => 'nullable|integer|exists:kecamatans,id',
            'ket'           => 'nullable|string',
        ], $this->customMessages);

        $data = PAM::create([
            'biodata_id'    => strip_tags(request()->post('biodata')),
            'locus'         => strip_tags(request()->post('locus')),
            'kecamatan_id'  => strip_tags(request()->post('kecamatan')),
            'ket'           => strip_tags(request()->post('ket')),
        ]);

        return response()->json($data);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = PAM::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = PAM::findOrFail($id);


        request()->validate([
            'biodata'       => 'nullable|integer|exists:biodata_w_n_i_s,id',
            'locus'         => 'required|string',
            'kecamatan'     => 'nullable|integer|exists:kecamatans,id',
            'ket'           => 'nullable|string',
        ], $this->customMessages);

        $data->update([
            'biodata_id'    => strip_tags(request()->post('biodata')),
            'locus'         => strip_tags(request()->post('locus')),
            'kecamatan_id'  => strip_tags(request()->post('kecamatan')),
            'ket'           => strip_tags(request()->post('ket')),
        ]);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = PAM::destroy($id);

        return response()->json($data);
    }
}

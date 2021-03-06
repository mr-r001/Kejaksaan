<?php

namespace App\Http\Controllers;

use App\Models\BiodataWNI;
use App\Models\Kecamatan;
use App\Models\TIKTerdakwa;
use App\Models\Umum;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    protected $customMessages = [
        'required'              => ':attribute harus diisi',
        'unique'                => 'This :attribute has already been taken.',
        'integer'               => ':Attribute must be a number.',
        'min'                   => ':Attribute must be at least :min.',
        'max'                   => ':Attribute may not be more than :max characters.',
        'exists'                => 'Not found.',
        'biodata.required'      => 'Pilih Informasi Terdakwa.',
        'kecamatan.required'    => 'Pilih Kecamatan.',
    ];

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Umum::orderBy('updated_at', 'DESC')
                ->get())
                ->addColumn('action', 'admin.umum.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.umum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biodata = TIKTerdakwa::orderBy('nama')->get();
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.umum.create', compact('biodata', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tgl'                       => 'required|date',
            'biodata'                   => 'required|string',
            'kecamatan'                 => 'required|integer',
            'locus'                     => 'required|date',
            'pasal'                     => 'required|string',
            'tgl_surat_pra_penuntutan'  => 'nullable|date',
            'nomor_surat_pra_penuntutan' => 'nullable|string',
            'tgl_surat_penuntutan'      => 'nullable|date',
            'nomor_surat_penuntutan'    => 'nullable|string',
            'eksekusi'                  => 'nullable|string',
            'upaya'                     => 'nullable|string',
            'keterangan'                => 'nullable|string',
        ], $this->customMessages);

        $data = new Umum();
        $data->tgl                          = request()->post('tgl');
        $data->biodata                      = strip_tags(request()->post('biodata'));
        $data->kecamatan_id                 = strip_tags(request()->post('kecamatan'));
        $data->locus                        = request()->post('locus');
        $data->pasal                        = request()->post('pasal');
        $data->tgl_surat_pra_penuntutan     = request()->post('tgl_surat_pra_penuntutan');
        $data->nomor_surat_pra_penuntutan   = strip_tags(request()->post('nomor_surat_pra_penuntutan'));
        $data->tgl_surat_penuntutan         = request()->post('tgl_surat_penuntutan');
        $data->nomor_surat_penuntutan       = strip_tags(request()->post('nomor_surat_penuntutan'));
        $data->eksekusi                     = strip_tags(request()->post('eksekusi'));
        $data->upaya                        = strip_tags(request()->post('upaya'));
        $data->keterangan                   = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.umum.index')->with('success', "Data berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Umum::findOrFail($id);
        $kecamatan = Kecamatan::orderBy('name')->get();

        return view('admin.umum.show', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Umum::findOrFail($id);
        $biodatas = TIKTerdakwa::orderBy('nama')->get();
        $kecamatans = Kecamatan::orderBy('name')->get();

        return view('admin.umum.edit', compact('data', 'biodatas', 'kecamatans'));
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
        $data = Umum::findOrFail($id);
        request()->validate([
            'tgl'                       => 'required|date',
            'biodata'                   => 'required|string',
            'kecamatan'                 => 'required|integer',
            'locus'                     => 'required|date',
            'pasal'                     => 'required|string',
            'tgl_surat_pra_penuntutan'  => 'nullable|date',
            'nomor_surat_pra_penuntutan' => 'nullable|string',
            'tgl_surat_penuntutan'      => 'nullable|date',
            'nomor_surat_penuntutan'    => 'nullable|string',
            'eksekusi'                  => 'nullable|string',
            'upaya'                     => 'nullable|string',
            'keterangan'                => 'nullable|string',
        ], $this->customMessages);

        $data->tgl                          = request()->post('tgl');
        $data->biodata                      = strip_tags(request()->post('biodata'));
        $data->kecamatan_id                 = strip_tags(request()->post('kecamatan'));
        $data->locus                        = request()->post('locus');
        $data->pasal                        = request()->post('pasal');
        $data->tgl_surat_pra_penuntutan     = request()->post('tgl_surat_pra_penuntutan');
        $data->nomor_surat_pra_penuntutan   = strip_tags(request()->post('nomor_surat_pra_penuntutan'));
        $data->tgl_surat_penuntutan         = request()->post('tgl_surat_penuntutan');
        $data->nomor_surat_penuntutan       = strip_tags(request()->post('nomor_surat_penuntutan'));
        $data->eksekusi                     = strip_tags(request()->post('eksekusi'));
        $data->upaya                        = strip_tags(request()->post('upaya'));
        $data->keterangan                   = strip_tags(request()->post('keterangan'));
        $data->save();

        return redirect()->route('admin.umum.index')->with('success', "Data berhasil di edit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Umum::destroy($id);

        return response()->json($data);
    }

    public function filter()
    {
        return view('admin.umum.filter');
    }

    public function download(Request $request)
    {
        $month = request()->post('bulan');
        $bulan = request()->post('bulan');
        if ($bulan == 'JANUARI') {
            $bulan = '01';
        } else if ($bulan == 'FEBRUARI') {
            $bulan = '02';
        } else if ($bulan == 'MARET') {
            $bulan = '03';
        } else if ($bulan == 'APRIL') {
            $bulan = '04';
        } else if ($bulan == 'MEI') {
            $bulan = '05';
        } else if ($bulan == 'JUNI') {
            $bulan = '06';
        } else if ($bulan == 'JULI') {
            $bulan = '07';
        } else if ($bulan == 'AGUSTUS') {
            $bulan = '08';
        } else if ($bulan == 'SEPTEMBER') {
            $bulan = '09';
        } else if ($bulan == 'OKTOBER') {
            $bulan = '10';
        } else if ($bulan == 'NOVEMBER') {
            $bulan = '11';
        } else if ($bulan == 'DESEMBER') {
            $bulan = '12';
        }
        $year = request()->post('tahun');
        $data = Umum::with('biodata')->orderBy('updated_at', 'DESC')->orderBy('updated_at', 'DESC')->whereYear('tgl', '=', $year)
            ->whereMonth('tgl', '=', $bulan)
            ->get();

        return view('admin.umum.show', compact('data', 'month', 'year'));
    }
}

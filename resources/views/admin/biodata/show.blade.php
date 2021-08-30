@extends('admin.layouts.master')
@section('title', 'Detail Kartu TIK Biodata')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Kartu TIK Biodata</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.wni.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Kartu TIK Biodata
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <i class="fa fa-edit"></i>
                        Detail
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Identitas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <td>NIK</td>
                                    <td class="text-center">{{ $data->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td class="text-center">{{ $data->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Tempat / Tanggal Lahir / Umur</td>
                                    <td class="text-center">{{ $data->tempat_lahir }} / {{ date('d M Y', strtotime($data->tanggal_lahir)) }} / {{ $age }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td class="text-center">{{ $data->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                </tr>
                                <tr>
                                    <td>Bangsa / Suku</td>
                                    <td class="text-center">{{ $data->bangsa->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td class="text-center">{{ $data->kewarganegaraan->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td class="text-center">{{ $data->kecamatan->name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td class="text-center">{{ $data->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td class="text-center">{{ $data->phone }}</td>
                                </tr>
                                <tr>
                                    <td>No Pasport</td>
                                    <td class="text-center">{{ $data->pasport }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td class="text-center">{{ $data->agama->name }}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td class="text-center">{{ $data->pendidikan->name }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td class="text-center">{{ $data->pekerjaan->name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Kantor</td>
                                    <td class="text-center">{{ $data->alamat_kantor }}</td>
                                </tr>
                                <tr>
                                    <td>Status Perkawinan</td>
                                    <td class="text-center">{{ $data->perkawinan->name }}</td>
                                </tr>
                                <tr>
                                    <td>Legitimasi Perkawinan</td>
                                    <td class="text-center">{{ $data->legitimasi_perkawinan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat dan Tanggal Perkawinan</td>
                                    <td class="text-center">{{ $data->tempat_perkawinan }}, {{ date('d M Y', strtotime($data->tanggal_perkawinan)) }}</td>
                                </tr>
                            </table>
                          </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Biodata Intelijen</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <td>Riwayat Hidup Singkap</td>
                                    <td>Pekerjaan: {{ $data->riwayat_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pendidikan: {{ $data->riwayat_pendidikan}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kepartaian: {{ $data->riwayat_kepartaian }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Ormas Lainnya: {{ $data->riwayat_ormas }}</td>
                                </tr>
                                <tr>
                                    <td>Keluarga</td>
                                    <td>1. Nama Istri / Suami: {{ $data->nama_istri }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2. Nama anak-anak: {{ $data->nama_anak }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>3. Nama Saudara Kandung: {{ $data->nama_saudara }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>4. Nama Ayah Kandung: {{ $data->nama_ayah_kandung }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Alamat: {{ $data->alamat_ayah_kandung }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Nama Ibu Kandung: {{ $data->nama_ibu_kandung }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Alamat: {{ $data->alamat_ibu_kandung }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>5. Nama Ayah Mertua: {{ $data->nama_ayah_mertua }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Alamat: {{ $data->alamat_ayah_mertua }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Nama Ibu Mertua: {{ $data->nama_ibu_mertua }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Alamat: {{ $data->alamat_ibu_mertua }}</td>
                                </tr>
                                <tr>
                                    <td>Referensi / Kenalan (nama dan alamat)</td>
                                    <td>1. {{ $data->nama_kenalan_pertama }} dan {{ $data->alamat_kenalan_pertama }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2. {{ $data->nama_kenalan_kedua }} dan {{ $data->alamat_kenalan_kedua }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>3. {{ $data->nama_kenalan_ketiga }} dan {{ $data->alamat_kenalan_ketiga }}</td>
                                </tr>
                                <tr>
                                    <td>Hobbi / Kegemaran</td>
                                    <td>{{ $data->hobi }}</td>
                                </tr>
                                <tr>
                                    <td>Kedudukan di Masyarakat</td>
                                    <td>{{ $data->kedudukan }}</td>
                                </tr>
                                <tr>
                                    <td>Lain-lain</td>
                                    <td>{{ $data->lain }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('backend/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Setup AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2').on('select2:selecting', function() {
                $(this).removeClass('is-invalid');
            });

            // Open Modal to Add new Author
            $('#btn-add').click(function(e) {
                e.preventDefault();
                $('#formModal').modal('show');
                $('.modal-title').html('Add Author');
                $('#author-form').trigger('reset');
                $('#btn-save').html('<i class="fas fa-check"></i> Save Changes');
                $('#author-form').find('.form-control').removeClass('is-invalid is-valid');
                $('#btn-save').val('save').removeAttr('disabled');
            });

            $('body').on('keyup', '#title, #category_id, #content, #thumbnail', function() {
                var test = $(this).val();
                if (test == '') {
                    $(this).removeClass('is-valid is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            })

            function filePreview2(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('img').remove();
                        $('#thumbnail').after('<img src="' + e.target.result + '" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            }

            $('#thumbnail').change(function() {
                filePreview2(this);
                $('#valid-thumbnail').html('');
            });

            $('form').submit(function() {
                $('#btn-submit').html('<i class="fas fa-cog fa-spin"></i> Saving...').attr("disabled", true);
            });
        })
    </script>
@endsection

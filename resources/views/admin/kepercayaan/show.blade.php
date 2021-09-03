@extends('admin.layouts.master')
@section('title', 'Detail Pengawasan Aliran Kepercayaan Masyarakat')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Modal -->
 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pengawasan Aliran Kepercayaan Masyarakat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('admin.kepercayaan.index') }}">
                            <i class="fa fa-file-pdf"></i>
                            Pengawasan Aliran Kepercayaan Masyarakat
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
                        <h4 class="card-title">Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md">
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{ date('d M Y', strtotime($data->tgl)) }}</th>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>{{ $data->kecamatan->name }}</th>
                                </tr>
                                <tr>
                                    <td>Nama Aliran Kepercayaan</td>
                                    <td>{{ $data->nama }}</th>
                                </tr>
                                <tr>
                                    <td>Nama Pimpinan</td>
                                    <td>{{ $data->pimpinan }}</th>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $data->alamat }}</th>
                                </tr>
                                <tr>
                                    <td>Kegiatan</td>
                                    <td>{{ $data->kegiatan }}</th>
                                </tr>
                                <tr>
                                    <td>Jumlah Pengikut</td>
                                    <td>{{ $data->jumlah_pengikut }}</th>
                                </tr>
                                <tr>
                                    <td>Nomor dan Tanggal Pendaftaran Pada Kantor KESBANGPOL</td>
                                    <td>{{ $data->nomor_pendaftaran }} / {{ date('d M Y', strtotime($data->tgl_pendaftaran)) }}</th>
                                </tr>
                                <tr>
                                    <td>Nomor dan Tanggal Pendaftaran Pada Badan Hukum</td>
                                    <td>{{ $data->nomor_badan }} / {{ date('d M Y', strtotime($data->tgl_badan)) }}</th>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>{{ $data->keterangan }}</th>
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

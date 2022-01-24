@extends('dashboard.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Perusahaan
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Data Perusahaan
            </li>
        </ol>
    </section>
    <section class="content container-fluid">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalAdminLTE">
            <i class="fa fa-plus">
            </i> Tambah Data Perusahaan
        </button>
        <table class="table table-bordered">
            <tr>
                <th>
                    NO
                </th>
                <th>
                    Nama Perusahaan
                </th>
                <th>
                    Link Visit
                </th>
                <th colspan="2">
                    Aksi
                </th>
            </tr>

            @foreach($prshs as $i=>$prsh)
            <tr>
                <td class="text-center">
                    {{$i+1}}
                </td>
                <td>
                    {{$prsh->pr_name}}
                </td>
                <td>
                    {{$prsh->pr_url}}
                </td>
                <td>
                    <button class="btn btn-success d-block m-auto">
                        Ubah
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger d-block m-auto">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="ModalAdminLTE" tabindex="-1" aria-labelledby="ModalAdminLTELabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModalAdminLTELabel">Input Data Perusahaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/{{Request::segment(3)}}/add">
                        @csrf

                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="i1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Link Visit</label>
                            <input type="text" name="i2" class="form-control">
                        </div>

                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.mainAdmin')

@section('dashboard')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Perusahaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Perusahaan</li>
        </ol>
    </section>
    <section class="content">
        <table class="table">
            <tr>
                <th>NO</th>
                <th>Nama Perusahaan</th>
                <th>Link Visit</th>
                <th colspan="2">Delete</th>
                <th>Update</th>
            </tr>

        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus">
            </i> Tambah Data Perusahaan</button>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Input Data Perusahaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">

                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Link Visit</label>
                            <input type="text" name="visit" class="form-control">
                        </div>

                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

    
@endsection
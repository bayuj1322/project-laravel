@extends('dashboard.index')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Data Perusahaan
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Data Perusahaan
            </li>
        </ol>
    </section>
    <form method="post" action="{{config('app.url')}}/{{Request::segment(1)}}/{{Request::segment(2)}}/{{Request::segment(3)}}/edit/{{ $prshs->id }}">
        @csrf
            
            <div class="content">
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nama Perusahaan</label>
                                        <input type="text" name="i1" class="form-control" value=" {{$prshs->pr_name}} ">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Link Visit</label>
                                        <input type="text" name="i2" class="form-control" value=" {{$prshs->pr_url}} ">
                                    </div>

                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>

            
                                </div>
                        </div>
            </div>
            
    
    </form>
</div>
@endsection
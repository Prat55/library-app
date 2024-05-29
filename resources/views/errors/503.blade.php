@extends('errors.layouts.app', ['title' => '503'])

@section('mainpage')
    <div class="page">
        <div class="page-content">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="text-primary">
                                <div class="mb-5 display-1 error-text font-weight-bold"> 5<i class="fa fa-frown-o"></i>3</div>
                                <h1 class="mb-3 h3 font-weight-bold">Sorry, an error has occured, Serive Unavaliable </h1>
                                <p class="leading-normal h5 font-weight-normal mb-7">You may have mistyped the address or
                                    the page may have moved.</p>
                                <a class="mb-5 btn btn-primary text-light fs-18" href="javascript:void(0);">Help</a>
                                <a class="mb-5 btn text-primary border-primary ms-2 fs-18" onclick="history.back();">Back to
                                    Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

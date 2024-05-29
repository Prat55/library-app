@extends('errors.layouts.app', ['title' => '500'])

@section('mainpage')
    <div class="page">
        <div class="page-content">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-lg-7">
                            <div class="text-white">
                                <div class="mb-5 fs-100 font-weight-normal h1 error-text"><i class="fa fa-frown-o"></i>ops!
                                </div>
                                <h1 class="mb-3 h3 font-weight-bold">Error 500: Internal Server Error</h1>
                                <p class="leading-normal h5 font-weight-normal mb-7">You may have mistyped the address or
                                    the page may have moved.</p>
                                <a class="mb-5 btn btn-light text-primary fs-18" href="javascript:void(0);">Help</a>
                                <a class="mb-5 btn text-light border-light ms-2 fs-18" onclick="history.back();">Back to
                                    Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

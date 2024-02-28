<div>
    <div class="page-header d-flex justify-content-between align-items-center">
        <div class="page-leftheader">
            <h4 class="mb-0 page-title text-primary">Inbox</h4>
        </div>

        <ul id="megaError" style="position: absolute;top: 0;right:0;z-index:999">
            @include('backend.message')
        </ul>

        <div class="d-flex justify-content-center align-items-center">
            <input type="text" class="rounded form-control" placeholder="Serach here...">
            <i class="cursor-pointer fa-solid fa-magnifying-glass ps-3"></i>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-4 col-xl-3">
            <div class="card">
                <div class="pb-3 mb-0 list-group list-group-transparent mail-inbox mail-inbox-elements">
                    <div class="mt-4 mb-4 text-center ms-4 me-4">
                        <a href="#0" class="btn btn-primary d-grid">Compose</a>
                    </div>
                    <a href="javascript:void(0);"
                        class="mb-2 list-group-item list-group-item-action d-flex align-items-center font-weight-bold text-muted">
                        <i class="fa fa-inbox fs-18 me-5 ms-2 text-muted"></i>Inbox
                        <span class="ms-auto badge bg-secondary me-2">14</span>
                    </a>
                    <a href="javascript:void(0);"
                        class="mb-2 list-group-item list-group-item-action d-flex align-items-center font-weight-bold text-muted">
                        <i class="fa fa-mail fs-18 me-5 ms-2 text-muted"></i> Sent Mail
                    </a>
                    <a href="javascript:void(0);"
                        class="mb-2 list-group-item list-group-item-action d-flex align-items-center font-weight-bold text-muted">
                        <i class="fa fa-alert-octagon fs-18 me-5 ms-2 text-muted"></i> Important
                        <span class="ms-auto badge bg-danger me-2">3</span>
                    </a>
                    <a href="javascript:void(0);"
                        class="mb-2 list-group-item list-group-item-action d-flex align-items-center font-weight-bold text-muted">
                        <i class="fa fa-star fs-18 me-5 ms-2 text-muted"></i> Starred
                    </a>
                    <a href="javascript:void(0);"
                        class="mb-2 list-group-item list-group-item-action d-flex align-items-center font-weight-semibold text-muted">
                        <i class="fe fe-trash-2 fs-18 me-5 ms-2 text-muted"></i> Trash
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-9">
            <div class="card">
                <div class="p-6 card-body">
                    <div class="inbox-body">
                        <div class="mb-4 mail-search">
                            <input type="text" placeholder="Search Inbox" class="form-control">
                        </div>
                        <div class="mail-option">
                            <div class="chk-all">
                                <div class="btn-group">
                                    <a data-bs-toggle="dropdown" href="javascript:void(0);" class="btn mini all"
                                        aria-expanded="false">
                                        All
                                        <i class="fa fa-angle-down "></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);"> None</a></li>
                                        <li><a href="javascript:void(0);"> Read</a></li>
                                        <li><a href="javascript:void(0);"> Unread</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-group">
                                <a data-original-title="Refresh" data-placement="top" data-bs-toggle=""
                                    href="javascript:void(0);" class="btn mini tooltips">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                            </div>
                            <div class="btn-group hidden-phone">
                                <a data-bs-toggle="dropdown" href="javascript:void(0);" class="btn mini blue"
                                    aria-expanded="false">
                                    More
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);"><i class="fa fa-pencil me-2"></i> Mark as Read</a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-ban me-2"></i> Spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-trash-o me-2"></i> Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="unstyled inbox-pagination">
                                <li><span>1-50 of 234</span></li>
                                <li>
                                    <a class="np-btn" href="javascript:void(0);"><i
                                            class="fa fa-angle-right pagination-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover text-nowrap">
                                <tbody>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star text-warning"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Tim Reid, S P N</td>
                                        <td class="view-message">Boost Your Website Traffic</td>
                                        <td class="view-message text-end text-muted">April 01</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star inbox-lefted"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Freelancer.com </td>
                                        <td class="view-message">Stop wasting your visitors </td>
                                        <td class="view-message text-end text-muted">May 23</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message dont-show">PHPClass</td>
                                        <td class="view-message ">Added a new class: Login Class Fast Site</td>
                                        <td class="view-message text-muted text-end">9:27 AM</td>
                                    </tr>

                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Facebook</td>
                                        <td class="view-message">Somebody requested a new password </td>
                                        <td class="view-message text-end text-muted">June 13</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star text-warning"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Skype</td>
                                        <td class="view-message">Password successfully changed</td>
                                        <td class="view-message text-end text-muted">March 24</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star inbox-lefted"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Google+</td>
                                        <td class="view-message">alireza, do you know</td>
                                        <td class="view-message text-end text-muted">March 09</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star inbox-lefted"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">WOW Slider </td>
                                        <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                                        <td class="view-message text-end text-muted">March 14</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i
                                                class="fa fa-star inbox-lefted text-warning"></i>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">LinkedIn Pulse</td>
                                        <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                                        <td class="view-message text-end text-muted">Feb 19</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Google Webmaster </td>
                                        <td class="view-message">Improve the search presence of WebSite</td>
                                        <td class="view-message text-end text-muted">March 15</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">JW Player</td>
                                        <td class="view-message">Last Chance: Upgrade to Pro for </td>
                                        <td class="view-message text-end text-muted">March 15</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Drupal Community</td>
                                        <td class="view-message">Welcome to the Drupal Community</td>
                                        <td class="view-message text-end text-muted">March 04</td>
                                    </tr>

                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i
                                                class="fa fa-star inbox-lefted text-warning"></i>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="dont-show font-weight-semibold">Zoosk </td>
                                        <td class="view-message">7 new singles we think you'll like</td>
                                        <td class="view-message text-end text-muted">May 14</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">LinkedIn </td>
                                        <td class="view-message">Alireza: Nokia Networks, System Group and </td>
                                        <td class="view-message text-end text-muted">February 25</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="dont-show font-weight-semibold">Facebook</td>
                                        <td class="view-message">Your account was recently logged into</td>
                                        <td class="view-message text-end text-muted">March 14</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Twitter</td>
                                        <td class="view-message">Your Twitter password has been changed</td>
                                        <td class="view-message text-end text-muted">April 07</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">InternetSeer</td>
                                        <td class="view-message">Performance Report</td>
                                        <td class="view-message text-end text-muted">July 14</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Bertina </td>
                                        <td class="view-message">IMPORTANT: Don't lose your domains!</td>
                                        <td class="view-message text-end text-muted">June 16</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star inbox-lefted"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Laura Gaffin, S P N
                                        </td>
                                        <td class="view-message">Your Website On Google (Higher Rankings Are Better)
                                        </td>
                                        <td class="view-message text-end text-muted">August 10</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Facebook</td>
                                        <td class="view-message">Alireza Zare Login faild</td>
                                        <td class="view-message text-end text-muted">feb 14</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star inbox-lefted"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">AddMe.com</td>
                                        <td class="view-message">Submit Your Website to the AddMe Business Directory
                                        </td>
                                        <td class="view-message text-end text-muted">August 10</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells">
                                            <label class="mb-0 custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="example-checkbox2" value="option2">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Terri Rexer, S P N</td>
                                        <td class="view-message">Forget Google AdWords: Un-Limited Clicks fo</td>
                                        <td class="view-message text-end text-muted">April 14</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <ul class="mb-4 pagination float-end">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="javascript:void(0);">Next</a>
                </li>
            </ul>
        </div>
    </div>

</div>

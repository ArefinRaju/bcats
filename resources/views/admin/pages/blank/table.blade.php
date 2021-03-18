@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('js')

@endsection
@section('css')
<link href="{{asset('admin')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">HTML (DOM) sourced data Examples</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Crud</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Datatables.net</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Data sources</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">HTML</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="navi-text">New Group</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-list-3"></i>
                                    </span>
                                    <span class="navi-text">Contacts</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-rocket-1"></i>
                                    </span>
                                    <span class="navi-text">Groups</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Calls</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-gear"></i>
                                    </span>
                                    <span class="navi-text">Settings</span>
                                </a>
                            </li>
                            <li class="navi-separator my-3"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-magnifier-tool"></i>
                                    </span>
                                    <span class="navi-text">Help</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Privacy</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-favourite text-primary"></i>
                        </span>
                        <h3 class="card-label">HTML(DOM) Sourced Data</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="#" class="btn btn-primary font-weight-bolder">
                            <i class="la la-plus"></i>New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Country</th>
                                <th>Ship City</th>
                                <th>Ship Address</th>
                                <th>Company Agent</th>
                                <th>Company Name</th>
                                <th>Ship Date</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>64616-103</td>
                                <td>Brazil</td>
                                <td>São Félix do Xingu</td>
                                <td>698 Oriole Pass</td>
                                <td>Hayes Boule</td>
                                <td>Casper-Kerluke</td>
                                <td>10/15/2017</td>
                                <td>5</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>54868-3377</td>
                                <td>Vietnam</td>
                                <td>Bình Minh</td>
                                <td>8998 Delaware Court</td>
                                <td>Humbert Bresnen</td>
                                <td>Hodkiewicz and Sons</td>
                                <td>4/24/2016</td>
                                <td>2</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>0998-0355</td>
                                <td>Philippines</td>
                                <td>Palagao Norte</td>
                                <td>91796 Sutteridge Road</td>
                                <td>Jareb Labro</td>
                                <td>Kuhlman Inc</td>
                                <td>7/11/2017</td>
                                <td>6</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>55154-6876</td>
                                <td>China</td>
                                <td>Jiannan</td>
                                <td>8 Muir Drive</td>
                                <td>Krishnah Tosspell</td>
                                <td>Prosacco-Kessler</td>
                                <td>2/5/2016</td>
                                <td>1</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>49349-069</td>
                                <td>United States</td>
                                <td>Shawnee Mission</td>
                                <td>782 Mallory Lane</td>
                                <td>Dale Kernan</td>
                                <td>Bernier and Sons</td>
                                <td>7/23/2017</td>
                                <td>5</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>53499-0393</td>
                                <td>Ukraine</td>
                                <td>Kozel’shchyna</td>
                                <td>02 Briar Crest Parkway</td>
                                <td>Halley Bentham</td>
                                <td>Schoen-Metz</td>
                                <td>2/21/2016</td>
                                <td>1</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>43074-105</td>
                                <td>Philippines</td>
                                <td>De la Paz</td>
                                <td>643 Mayer Road</td>
                                <td>Burgess Penddreth</td>
                                <td>DuBuque, Stanton and Stanton</td>
                                <td>10/25/2016</td>
                                <td>5</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>76328-333</td>
                                <td>Portugal</td>
                                <td>Sobreira</td>
                                <td>6715 Dakota Parkway</td>
                                <td>Cob Sedwick</td>
                                <td>Homenick-Nolan</td>
                                <td>2/18/2016</td>
                                <td>3</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>21130-054</td>
                                <td>France</td>
                                <td>Roissy Charles-de-Gaulle</td>
                                <td>4942 Darwin Hill</td>
                                <td>Tabby Callaghan</td>
                                <td>Daugherty-Considine</td>
                                <td>3/26/2016</td>
                                <td>2</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>68788-9890</td>
                                <td>Dominican Republic</td>
                                <td>Cristóbal</td>
                                <td>854 Dapin Terrace</td>
                                <td>Broddy Jarry</td>
                                <td>Walter Group</td>
                                <td>8/10/2016</td>
                                <td>1</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>68428-740</td>
                                <td>Morocco</td>
                                <td>Tidili Mesfioua</td>
                                <td>67 Talisman Drive</td>
                                <td>Marjorie McGougan</td>
                                <td>Littel and Sons</td>
                                <td>2/8/2016</td>
                                <td>6</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>43269-779</td>
                                <td>Yemen</td>
                                <td>Az Zāhir</td>
                                <td>5583 Walton Hill</td>
                                <td>Edsel Sprigging</td>
                                <td>Kulas, Huels and Strosin</td>
                                <td>11/13/2017</td>
                                <td>6</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>0573-0174</td>
                                <td>Armenia</td>
                                <td>Doghs</td>
                                <td>7024 Eagan Court</td>
                                <td>Jess Gouldeby</td>
                                <td>Moen Group</td>
                                <td>9/10/2017</td>
                                <td>5</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>67868-117</td>
                                <td>Indonesia</td>
                                <td>Pakemitan</td>
                                <td>141 Spaight Avenue</td>
                                <td>Marys Matzl</td>
                                <td>Emard-Gerhold</td>
                                <td>3/5/2016</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>0641-6114</td>
                                <td>Kazakhstan</td>
                                <td>Shu</td>
                                <td>601 Chinook Street</td>
                                <td>Gabrila Franscioni</td>
                                <td>Gusikowski LLC</td>
                                <td>6/21/2016</td>
                                <td>4</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>63629-4970</td>
                                <td>Thailand</td>
                                <td>Chang Klang</td>
                                <td>7109 Ilene Place</td>
                                <td>Cozmo Booker</td>
                                <td>Dickinson-Klein</td>
                                <td>2/29/2016</td>
                                <td>1</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>59528-4456</td>
                                <td>Canada</td>
                                <td>Melfort</td>
                                <td>141 Aberg Pass</td>
                                <td>Arlie Larking</td>
                                <td>Rosenbaum Group</td>
                                <td>7/7/2017</td>
                                <td>4</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>0054-0080</td>
                                <td>Iceland</td>
                                <td>Sandgerði</td>
                                <td>4 Derek Alley</td>
                                <td>Yorker Scogings</td>
                                <td>Gorczany LLC</td>
                                <td>7/6/2017</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>28475-810</td>
                                <td>Indonesia</td>
                                <td>Keleng</td>
                                <td>49 Swallow Court</td>
                                <td>Dominick Muscott</td>
                                <td>Swaniawski-Sipes</td>
                                <td>5/15/2016</td>
                                <td>2</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>53645-1070</td>
                                <td>Russia</td>
                                <td>Tugulym</td>
                                <td>611 Hintze Place</td>
                                <td>Laurette Kynforth</td>
                                <td>Torp-Satterfield</td>
                                <td>10/18/2017</td>
                                <td>1</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>66869-137</td>
                                <td>Indonesia</td>
                                <td>Binangun</td>
                                <td>535 Delladonna Trail</td>
                                <td>Beryl Lycett</td>
                                <td>Schoen Inc</td>
                                <td>6/28/2017</td>
                                <td>3</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>0069-0181</td>
                                <td>Czech Republic</td>
                                <td>Tlumačov</td>
                                <td>8 Hauk Street</td>
                                <td>Carny Boggas</td>
                                <td>Kuphal LLC</td>
                                <td>6/24/2016</td>
                                <td>2</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>50580-449</td>
                                <td>United States</td>
                                <td>Saint Augustine</td>
                                <td>9050 High Crossing Pass</td>
                                <td>Dyana Axelby</td>
                                <td>Runolfsdottir-Hayes</td>
                                <td>3/16/2017</td>
                                <td>2</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>55714-2247</td>
                                <td>Netherlands</td>
                                <td>Nijmegen</td>
                                <td>2 Laurel Avenue</td>
                                <td>Orelle Duffy</td>
                                <td>Roberts and Sons</td>
                                <td>4/5/2016</td>
                                <td>5</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>48951-1208</td>
                                <td>Russia</td>
                                <td>Ryazhsk</td>
                                <td>131 Lerdahl Park</td>
                                <td>Taylor Kinder</td>
                                <td>Terry-Howell</td>
                                <td>4/19/2017</td>
                                <td>3</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>30142-179</td>
                                <td>Russia</td>
                                <td>Kazan</td>
                                <td>7 Erie Pass</td>
                                <td>Emanuele Aylesbury</td>
                                <td>Torp LLC</td>
                                <td>7/6/2017</td>
                                <td>3</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>49349-025</td>
                                <td>Thailand</td>
                                <td>Bang Racham</td>
                                <td>98943 Schiller Pass</td>
                                <td>Dorie Gibke</td>
                                <td>Tremblay and Sons</td>
                                <td>7/17/2017</td>
                                <td>1</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>28</td>
                                <td>55154-4989</td>
                                <td>Russia</td>
                                <td>Solnechnyy</td>
                                <td>485 Mockingbird Road</td>
                                <td>Melisandra Harragin</td>
                                <td>Turner-Cartwright</td>
                                <td>12/3/2016</td>
                                <td>5</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>29</td>
                                <td>13537-426</td>
                                <td>Lebanon</td>
                                <td>Marjayoûn</td>
                                <td>9141 Cascade Street</td>
                                <td>Berenice Lampett</td>
                                <td>Johnston-Fritsch</td>
                                <td>12/27/2017</td>
                                <td>2</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>52565-009</td>
                                <td>Jamaica</td>
                                <td>Manchioneal</td>
                                <td>88503 Shopko Center</td>
                                <td>Tammie McMurthy</td>
                                <td>Sipes, Conn and Stiedemann</td>
                                <td>10/11/2017</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>0264-5535</td>
                                <td>United Kingdom</td>
                                <td>Glasgow</td>
                                <td>6 Lakeland Center</td>
                                <td>Dinnie Joyes</td>
                                <td>Keebler Group</td>
                                <td>6/5/2016</td>
                                <td>5</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>15370-110</td>
                                <td>China</td>
                                <td>Caijiang</td>
                                <td>2 Mariners Cove Way</td>
                                <td>Kerianne Axelbey</td>
                                <td>Wolff, Sporer and Bechtelar</td>
                                <td>2/20/2016</td>
                                <td>6</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>67046-271</td>
                                <td>China</td>
                                <td>Sanhe</td>
                                <td>537 Graceland Park</td>
                                <td>Kiley MacTerlagh</td>
                                <td>Hauck Inc</td>
                                <td>6/9/2017</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>34</td>
                                <td>49288-0356</td>
                                <td>Indonesia</td>
                                <td>Rupe</td>
                                <td>88 Blackbird Alley</td>
                                <td>Trula Shuttle</td>
                                <td>Will-Morissette</td>
                                <td>2/28/2016</td>
                                <td>5</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>35</td>
                                <td>41163-332</td>
                                <td>Poland</td>
                                <td>Borowno</td>
                                <td>72 Iowa Drive</td>
                                <td>Hollis Brislen</td>
                                <td>Lowe, Jaskolski and Gulgowski</td>
                                <td>7/7/2016</td>
                                <td>4</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>68428-088</td>
                                <td>Greece</td>
                                <td>Néa Péramos</td>
                                <td>76 Haas Alley</td>
                                <td>Marsh Battin</td>
                                <td>Fay LLC</td>
                                <td>6/3/2017</td>
                                <td>6</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>52686-288</td>
                                <td>Chile</td>
                                <td>San Carlos</td>
                                <td>6915 Mifflin Terrace</td>
                                <td>Patrizio Pinnion</td>
                                <td>Haag-Stokes</td>
                                <td>10/7/2016</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>38</td>
                                <td>68084-534</td>
                                <td>Ukraine</td>
                                <td>Ukrainka</td>
                                <td>77 Charing Cross Trail</td>
                                <td>Ilario Daouse</td>
                                <td>Nitzsche, Davis and Romaguera</td>
                                <td>4/10/2016</td>
                                <td>3</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>39</td>
                                <td>60681-2104</td>
                                <td>China</td>
                                <td>Shangdu</td>
                                <td>61653 Welch Trail</td>
                                <td>Blisse Coleborn</td>
                                <td>Bailey, Windler and Marquardt</td>
                                <td>5/15/2017</td>
                                <td>6</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>63402-193</td>
                                <td>China</td>
                                <td>Xibin</td>
                                <td>9 Duke Point</td>
                                <td>Augustin Jouannisson</td>
                                <td>Witting, Reilly and Morar</td>
                                <td>7/3/2016</td>
                                <td>3</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>41</td>
                                <td>0078-0614</td>
                                <td>Russia</td>
                                <td>Skolkovo</td>
                                <td>5 Bay Center</td>
                                <td>Kaleena Jennison</td>
                                <td>Johnston Inc</td>
                                <td>11/26/2016</td>
                                <td>5</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>42</td>
                                <td>60660-7787</td>
                                <td>Dominican Republic</td>
                                <td>Pimentel</td>
                                <td>5 Northwestern Drive</td>
                                <td>Mariel Petronis</td>
                                <td>Mitchell, Bashirian and Schroeder</td>
                                <td>1/28/2016</td>
                                <td>5</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>43</td>
                                <td>51079-345</td>
                                <td>Malaysia</td>
                                <td>Kuala Lumpur</td>
                                <td>11 Melvin Hill</td>
                                <td>Adamo Scroggie</td>
                                <td>Cartwright Group</td>
                                <td>6/9/2016</td>
                                <td>4</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>44</td>
                                <td>29033-021</td>
                                <td>Portugal</td>
                                <td>Serzedelo</td>
                                <td>380 Wayridge Street</td>
                                <td>Lewiss Kilmartin</td>
                                <td>Stroman-Orn</td>
                                <td>5/9/2017</td>
                                <td>3</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>12830-816</td>
                                <td>France</td>
                                <td>Fos-sur-Mer</td>
                                <td>9924 Mariners Cove Circle</td>
                                <td>Claretta Sachno</td>
                                <td>Zemlak-Cruickshank</td>
                                <td>9/4/2016</td>
                                <td>4</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>46</td>
                                <td>0781-5555</td>
                                <td>Indonesia</td>
                                <td>Kotaagung</td>
                                <td>9 Calypso Road</td>
                                <td>Bryn Van Castele</td>
                                <td>Beier-Mante</td>
                                <td>3/17/2017</td>
                                <td>5</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>47</td>
                                <td>0378-7004</td>
                                <td>Sweden</td>
                                <td>Karlstad</td>
                                <td>12000 Burrows Street</td>
                                <td>Tades Gatch</td>
                                <td>Klocko, Koelpin and Nikolaus</td>
                                <td>7/10/2016</td>
                                <td>5</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>48</td>
                                <td>49483-052</td>
                                <td>Indonesia</td>
                                <td>Kebonjaya</td>
                                <td>2 Oakridge Crossing</td>
                                <td>Reinold Jolland</td>
                                <td>Zieme-Funk</td>
                                <td>5/24/2016</td>
                                <td>4</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>49</td>
                                <td>10812-357</td>
                                <td>Serbia</td>
                                <td>Ruma</td>
                                <td>7 Wayridge Plaza</td>
                                <td>Ky Brainsby</td>
                                <td>Towne Inc</td>
                                <td>11/1/2016</td>
                                <td>2</td>
                                <td>3</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>49349-222</td>
                                <td>China</td>
                                <td>Zhulan</td>
                                <td>55385 Stoughton Trail</td>
                                <td>Sheryl Giddings</td>
                                <td>Grimes, Ryan and Larkin</td>
                                <td>9/15/2017</td>
                                <td>3</td>
                                <td>1</td>
                                <td nowrap="nowrap"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@section('js')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('admin')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('admin')}}/assets/js/pages/crud/datatables/data-sources/html.js?v=7.0.4"></script>
<!--end::Page Scripts-->
@endsection
@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Holidays</h2>
                    <!-- <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Lucid</a></li>
                        <li class="breadcrumb-item active">Holidays</li>
                    </ul> -->
                </div>
                <div class="col-md-6 col-sm-12 text-md-end">
                    <div class="d-inline-flex text-start">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-user"></i> 1,784</h6>
                            <small>Visitors</small>
                        </div>
                        <span id="bh_visitors"></span>
                    </div>
                    <div class="d-inline-flex text-start ms-lg-3 me-lg-3 ms-1 me-1">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-globe"></i> 325</h6>
                            <small>Visits</small>
                        </div>
                        <span id="bh_visits"></span>
                    </div>
                    <div class="d-inline-flex text-start">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-comments"></i> 13</h6>
                            <small>Chats</small>
                        </div>
                        <span id="bh_chats"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">Holidays List</div>
                    <div class="card-body">
                        <table id="holidays_list" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>Holiday name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>January 15</td>
                                    <td>Wednesday</td>
                                    <td>Makara Sankranti</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>January 26</td>
                                    <td>Sunday</td>
                                    <td>Republic Day</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>February 21</td>
                                    <td>Friday</td>
                                    <td>Maha Shivaratri</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>March 10</td>
                                    <td>Tuesday</td>
                                    <td>Holi</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>March 25</td>
                                    <td>Wednesday</td>
                                    <td>Ugadi</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td>April 2</td>
                                    <td>Thursday</td>
                                    <td>Ram Navami</td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td>April 6</td>
                                    <td>Monday</td>
                                    <td>Mahavir Jayanti</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td>April 14</td>
                                    <td>Tuesday</td>
                                    <td>Dr Ambedkar Jayanti</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td>April 25</td>
                                    <td>Saturday</td>
                                    <td>Maharshi Parasuram Jayanti</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>May 24</td>
                                    <td>Sunday</td>
                                    <td>Idul Fitr</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>May 25</td>
                                    <td>Monday</td>
                                    <td>Idul Fitr</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>July 31</td>
                                    <td>Friday</td>
                                    <td>Bakrid / Eid al Adha</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>August 1</td>
                                    <td>Saturday</td>
                                    <td>Bakrid / Eid al Adha</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>August 3</td>
                                    <td>Monday</td>
                                    <td>Raksha Bandhan</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>August 12</td>
                                    <td>Wednesday</td>
                                    <td>Janmashtami</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>August 15</td>
                                    <td>Saturday</td>
                                    <td>Independence Day</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>August 16</td>
                                    <td>Sunday</td>
                                    <td>Parsi New Year</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>August 22</td>
                                    <td>Saturday</td>
                                    <td>Ganesh Chaturthi</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>August 30</td>
                                    <td>Sunday</td>
                                    <td>Muharram</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>October 2</td>
                                    <td>Friday</td>
                                    <td>Gandhi Jayanti</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>October 25</td>
                                    <td>Sunday</td>
                                    <td>Vijaya Dashami</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>October 30</td>
                                    <td>Friday</td>
                                    <td>Eid e Milad</td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>October 31</td>
                                    <td>Saturday</td>
                                    <td>Sardar Vallabhbhai Patel
                                        Jayanti</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>November 14</td>
                                    <td>Saturday</td>
                                    <td>Diwali</td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>November 15</td>
                                    <td>Sunday</td>
                                    <td>Vikram Samvat New Year</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>November 16</td>
                                    <td>Monday</td>
                                    <td>Bhai Dooj</td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td>November 30</td>
                                    <td>Monday</td>
                                    <td>Guru Nanak Jayanti</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>December 25</td>
                                    <td>Friday</td>
                                    <td>Christmas Day</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('externaljs')
<script>
    $(document).ready(function() {
        $('#holidays_list')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                }]
            });
    });
</script>
@endsection
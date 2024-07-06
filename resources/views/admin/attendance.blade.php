@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Attendance List</h2>

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
                                        <th>20</th>
                                        <th>21</th>
                                        <th>22</th>
                                        <th>23</th>
                                        <th>24</th>
                                        <th>25</th>
                                        <th>26</th>
                                        <th>27</th>
                                        <th>28</th>
                                        <th>29</th>
                                        <th>30</th>
                                        <th>31</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Tim Hank</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Frank Camly</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Gary Camara</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Fidel Tonn</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Tim Hank</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Maryam Amiri</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Hossein Shams</td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-check"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                        <td><i class="fa fa-close text-danger"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- Add model  Size -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Leave</h6>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-lg-6 col-sm-12">

                            <label class="form-label">Duration <small class="text-danger">*</small></label>
                            <select class="form-select select2" aria-label="Default select example">
                                <option>Choose Duration</option>
                                <option>Single Day</option>
                                <option>Multiple Days</option>
                                <option>Half Day</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <label class="form-label">Leave Category <small class="text-danger">*</small></label>
                            <select class="form-select select2" aria-label="Default select example">
                                <option>Choose Leave Type</option>
                                <option>Casual Leave (12)</option>
                                <option>Medical Leave</option>
                                <option>Maternity Leave</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">From <small class="text-danger">*</small></label>
                           <input type="text" data-provide="datepicker" data-date-autoclose="true"
                                class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                        </div>
                        <div class="col-6">
                            <label class="form-label">To <small class="text-danger">*</small></label>
                            <input type="text" data-provide="datepicker" data-date-autoclose="true"
                                class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                        </div>
                        <div class="col-12">
                            <textarea rows="6" class="form-control no-resize" placeholder="Leave Reason *"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!---Delet Model--->
    <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="ModalDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center pt-4">
                    <i class="fa fa-warning fa-4x text-warning"></i>
                    <p class="fs-3 my-3">Are you sure?</p>
                    <p class="mb-4">You will not be able to recover this imaginary file!</p>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete it!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('externaljs')

@endsection

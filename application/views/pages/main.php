<div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <div class="col-sm-12 col-lg-3">
              <div class="card mb-4 text-white bg-primary">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=count($instructors);?></div>
                            <div>Instructors</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=count($customers);?></div>
                            <div>Users</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-danger">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=count($cars);?></div>
                            <div>Cars</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-info">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=count($enrollees);?></div>
                            <div>Active Admission</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>                      
                      <!-- /.col-->                      
                    </div>         
                    <div class="card mb-4">
                      <div class="card-header"><b>My Sessions</b></div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                              <table class="table border mb-4 mt-4">
                                <thead class="table-light fw-semibold">
                                  <tr class="align-middle">
                                    <th class="text-center">
                                      #
                                    </th>
                                    <th>Instructor</th>
                                    <th>Car</th>
                                    <th>Date & Time</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                      </div>
                    </div>
                    </div>                               
                  </div>                  
                  </div>                   
        </div>
      </div>
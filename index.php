<?php  include('includes/header.php')  ?>
    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="physician.php" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Physician</span></a></li>
              <li class="sidebar-list-item"><a href="treatment.php" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Treatment</span></a></li>
              <li class="sidebar-list-item"><a href="hospital.php" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span> &nbsp;Hospital</span></a></li>
              <li class="sidebar-list-item"><a href="login.html" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Logout</span></a></li>
        </ul>

      </div>

      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">

            <div class="row" >
              <div class="col-lg-8">
                <div class="card mb-5 mb-lg-0">         
                  <div class="card-header">
                    <h2 class="h6 mb-0 text-uppercase">Database history</h2>
                  </div>
                  <div class="card-body">
                    <p class="text-gray mb-5">Implemented database management for 3 tables: Treatment, Hospital, Physician</p>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray">
<!--                            <i class="fab fa-dropbox"></i>-->
                        </div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center"> <span>Treatment</span><span class="dot dot-sm ml-2 bg-violet"></span></h6><small class="text-gray">Detailed treatment plan of each disease.</small>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-violet">
                        <h5>Total : 15</h5>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray">
<!--                            <i class="fab fa-apple"></i>-->
                        </div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center"> <span>Hospital</span><span class="dot dot-sm ml-2 bg-green"></span></h6><small class="text-gray">Associated hospitals</small>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-green">
                        <h5>Total : 6</h5>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray">
<!--                            <i class="fas fa-shopping-basket"></i>-->
                        </div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center"> <span>Physician</span><span class="dot dot-sm ml-2 bg-blue"></span></h6><small class="text-gray">Who will take charge of surgery</small>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-blue">
                        <h5>Total : 12</h5>
                      </div>
                    </div>
<!--                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">-->
<!--                      <div class="left d-flex align-items-center">-->
<!--                        <div class="icon icon-lg shadow mr-3 text-gray"><i class="fab fa-android"></i></div>-->
<!--                        <div class="text">-->
<!--                          <h6 class="mb-0 d-flex align-items-center"> <span>Play Store.</span><span class="dot dot-sm ml-2 bg-red"></span></h6><small class="text-gray">Software cost</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-red">-->
<!--                        <h5>-$20</h5>-->
<!--                      </div>-->
<!--                    </div>-->
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0">Completed cases</h6><span class="text-gray">127 new cases</span>
                    </div>
                  </div>
                  <div class="icon bg-violet text-white"><i class="fas fa-clipboard-check"></i></div>
                </div>

                <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">New clients</h6><span class="text-gray">25 new clients</span>
                    </div>
                  </div>
                  <div class="icon bg-blue text-white"><i class="fas fa-user-friends"></i></div>
                </div>
                <div class="card px-5 py-4">
                  <h2 class="mb-0 d-flex align-items-center"><span>86.4</span><span class="dot bg-red d-inline-block ml-3"></span></h2><span class="text-muted">Server time</span>
                  <div class="chart-holder">
                    <canvas id="lineChart3" style="max-height: 7rem !important;" class="w-100">      </canvas>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
<?php  include('includes/footer.php')  ?>
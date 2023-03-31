  <!-- ======= Header ======= -->

      <header id="header" class="header fixed-top d-flex align-items-center">
          <div class="d-flex align-items-center justify-content-between">
              <a href="#"  class="logo d-flex align-items-center text-decoration-none">
                  <img src="../assets/img/icon/RSUD-logo.png" alt="">
                  <span class="d-lg-block">SiBonlabel</span>
              </a>
          </div>
          <!-- End Logo -->

            <li>
              <hr class="dropdown-divider">
            </li>

          <nav class="header-nav ms-auto ">
              <ul class="d-flex align-items-center">
                  <li class="nav-item dropdown">

                      <a class="nav-link nav-icon text-decoration-none" href="#" data-bs-toggle="dropdown">
                          <i class="bi bi-bell"></i>
                          <span class="badge bg-primary badge-number">4</span>
                      </a><!-- End Notification Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                          <li class="dropdown-header">
                              You have 4 new notifications
                              <a href="#" class="text-decoration-none"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li class="notification-item">
                              <i class="bi bi-exclamation-circle text-warning"></i>
                              <div>
                                  <h4>Lorem Ipsum</h4>
                                  <p>Quae dolorem earum veritatis oditseno</p>
                                  <p>30 min. ago</p>
                              </div>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li class="notification-item">
                              <i class="bi bi-x-circle text-danger"></i>
                              <div>
                                  <h4>Atque rerum nesciunt</h4>
                                  <p>Quae dolorem earum veritatis oditseno</p>
                                  <p>1 hr. ago</p>
                              </div>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li class="notification-item">
                              <i class="bi bi-check-circle text-success"></i>
                              <div>
                                  <h4>Sit rerum fuga</h4>
                                  <p>Quae dolorem earum veritatis oditseno</p>
                                  <p>2 hrs. ago</p>
                              </div>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li class="notification-item">
                              <i class="bi bi-info-circle text-primary"></i>
                              <div>
                                  <h4>Dicta reprehenderit</h4>
                                  <p>Quae dolorem earum veritatis oditseno</p>
                                  <p>4 hrs. ago</p>
                              </div>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li class="dropdown-footer">
                              <a href="#" class="text-decoration-none">Show all notifications</a>
                          </li>

                      </ul><!-- End Notification Dropdown Items -->

                  </li><!-- End Notification Nav -->


                  <li class="nav-item dropdown pe-3">

                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                          data-bs-toggle="dropdown">
                          <span class="d-none d-md-block ps-2"
                              style="margin-right: 5px;">{{ auth()->user()->nama }}</span>
                          {{-- <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                          <div class="rounded-circle">
                          <i class="bi bi-person-circle fs-2"></i>
                        </div>
                      </a><!-- End Profile Iamge Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li class="dropdown-header">
                              {{ auth()->user()->nama }}
                              <span>{{ auth()->user()->cekLevel }}</span>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                  <i class="bi bi-person"></i>
                                  <span>My Profile</span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                  <i class="bi bi-gear"></i>
                                  <span>Account Settings</span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                  <i class="bi bi-question-circle"></i>
                                  <span>Need Help?</span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="#">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Sign Out</span>
                              </a>
                          </li>

                      </ul><!-- End Profile Dropdown Items -->
                  </li><!-- End Profile Nav -->
                  <li class="nav-item mx-5">
                  <i class="bi bi-list toggle-sidebar-btn"></i>
                </li>
              </ul>
          </nav><!-- End Icons Navigation -->
      </header><!-- End Header -->


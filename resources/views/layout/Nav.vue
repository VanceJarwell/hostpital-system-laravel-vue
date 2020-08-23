<template>
  <div>
    <div class="sidebar" data-color="grey">
      <div class="logo">
        <div class="text-center">
          <h2 class="text-light">Hospital</h2>
          <img class="rounded-circle z-depth-500 bg-light p-1 shadow " width="50%" alt="50x50" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" data-holder-rendered="true">
          <h5 class="text-light">Dr. Ivy Palma</h5>
        </div>
      </div>
      <div class="sidebar-wrapper " id="sidebar-wrapper">
        <ul class="nav mb-5 pb-5">
          <li class="">
            <router-link :to="{ name: 'home' }">
              <i class="now-ui-icons business_chart-pie-36"></i>
              <p>Dashboard</p>
            </router-link>
          </li>
          <li>
            <router-link :to="{ name: 'profileSettings' }">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
              <p>Settings</p>
            </router-link>
          </li>
          <li class=""> 
            <router-link :to="{ name: 'logout' }">
              <i class="now-ui-icons arrows-1_share-66"></i>
              <p>Logout</p>
            </router-link>
          </li>
          <!-- <p class="text-light text-center lead">Options</p> -->
          <!-- <li>
            <a data-toggle="collapse" href="#patient" class="patient" aria-expanded="false">
              <i class="now-ui-icons users_circle-08"></i> 
              <p>
                Patient <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="patient" style="">
              <ul class="nav subnav">
                <li>
                  <router-link :to="{ name: 'addPatient' }">
                    <p class="">Add Patient <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </router-link>
                </li>
                <li> 
                  <a href="#">
                    <p class=""><i class="now-ui-icons files_single-copy-04 ml-5"></i>Patient Records </p>
                  </a>
                </li>
              </ul>
            </div>  
          </li> -->
          <h5 class="menu-label"> STAFF </h5>
          <ul class="nav">
            <li>
              <router-link :to="{name: 'physician'}">
                <i class="fas fa-user-md"></i> 
                <span>Physicians</span>
              </router-link>
            </li>
          </ul>
          <li>
            <a data-toggle="collapse" href="#nurse" class="nurse" aria-expanded="false">
              <i class='fas fa-user-nurse'></i>
              <p>
                Nurse <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="nurse" style="">
              <ul class="nav subnav">
                <li>
                  <router-link :to="{ name: 'addNurse' }">
                    <p class="">Add Nurse <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </router-link>
                </li>
                <li> 
                  <router-link :to="{ name: 'nurseRecords'}">
                    <p class="">Nurse Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </router-link>
                </li>
              </ul>
            </div>  
          </li>
          <h5 class="menu-label"> PATIENTS </h5>
          <li>
              <router-link :to="{name: 'patient'}">
              <i class="now-ui-icons tech_tv"></i>
              <p>Patients</p></router-link> 
          </li>
          <li>
            <a href="./dashboard.html">
              <i class="fas fa-prescription"></i>
              <p>Prescription</p>
            </a>
          </li>
          <li>
            <router-link :to="{name: 'medical_procedure'}">
              <i class="fas fa-file-medical"></i>  
                Medical Procedures<b class="caret"></b>
            </router-link>
          </li>
          <!-- <li>
            <a data-toggle="collapse" href="#physician" class="physician" aria-expanded="false">
              <i class="now-ui-icons users_single-02"></i>  
              <p>
                Physician <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="physician" style="">
              <ul class="nav subnav">
                <li>
                  <a href="">
                    <p class="">Add Physician <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </a>
                </li>
                <li> 
                  <a href="#">
                    <p class="">Physician Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </a>
                </li>
              </ul>
            </div>  
          </li> -->
          <!-- <li>
            <a data-toggle="collapse" href="#prescription" class="prescription" aria-expanded="false">
              <i class="now-ui-icons education_paper"></i>  
              <p>
                Prescription<b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="prescription" style="">
              <ul class="nav subnav">
                <li>
                  <a href="">
                    <p class="">Add Prescription <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </a>
                </li>
                <li> 
                  <a href="#">
                    <p class="">Prescription Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </a>
                </li>
              </ul>
            </div>  
          </li> -->
          <!-- <li>
            <a data-toggle="collapse" href="#medication" class="medication" aria-expanded="false">
              <i class="now-ui-icons media-2_sound-wave"></i>  
              <p>
                Medication<b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="medication" style="">
              <ul class="nav subnav">
                <li>
                  <a href="">
                    <p class="">Add Medication <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </a>
                </li>
                <li> 
                  <a href="#">
                    <p class="">Medication Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </a>
                </li>
              </ul>
            </div>  
          </li> -->
          <h5 class="menu-label"> OTHERS </h5>
          <li>
            <a data-toggle="collapse" href="#department" class="department" aria-expanded="false">
              <i class="now-ui-icons education_hat"></i>  
              <p>
                Department<b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="department" style="">
              <ul class="nav subnav">
                <li>
                  <router-link :to="{ name: 'addDepartment' }">
                    <p class="">Add Department <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </router-link>
                </li>
                <li> 
                  <router-link :to="{ name: 'departmentRecords'} ">
                    <p class="">Department Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </router-link>
                </li>
              </ul>
            </div>  
          </li>
          <li>
            <a data-toggle="collapse" href="#building" class="building" aria-expanded="false">
              <i class="now-ui-icons business_bank"></i>  
              <p>
                Building<b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="building" style="">
              <ul class="nav subnav">
                <li>
                  <router-link :to="{ name: 'addBuilding' }">
                    <p class="">Add Building <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </router-link>
                </li>
                <li> 
                  <router-link :to="{ name: 'buildingRecords'} ">
                    <p class="">Building Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </router-link>
                </li>
              </ul>
            </div>  
          </li>
          <li>
            <a data-toggle="collapse" href="#room" class="room" aria-expanded="false">
              <i class="now-ui-icons objects_key-25"></i>  
              <p>
                Room<b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="room" style="">
              <ul class="nav subnav">
                <li>
                  <router-link :to="{ name: 'addRoom' }">
                    <p class="">Add Room <i class="now-ui-icons ui-1_simple-add ml-5"></i></p>
                  </router-link>
                </li>
                <li> 
                  <router-link :to="{ name: 'roomRecords' }">
                    <p class="">Room Records <i class="now-ui-icons files_single-copy-04 ml-5"></i></p>
                  </router-link>
                </li>
              </ul>
            </div>  
          </li>
          <h5 class="menu-label"> MEDICINE </h5>
          <ul class="nav">
            <li>
              <a data-toggle="collapse" href="#stocks" class="shop-parameter" aria-expanded="false">
                <i class="fas fa-plus-square"></i>     
                <p>
                Stocks <b class="caret"></b>
                </p>
              </a>
              <div class="collapse" id="stocks" style="">
                  <ul class="nav subnav">
                    <li>
                      <a href="#">
                        <span class="sidebar-normal">Stocks</span>
                      </a>
                    </li>

                  </ul>
              </div>   
            </li>
          </ul>
        </ul>
      </div>
    </div>
    <!-- Navbar -->
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler mt-3 bg-aqua text-light shadow-lg"><i class="fas fa-bars"></i></button>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
  </div>
</template>
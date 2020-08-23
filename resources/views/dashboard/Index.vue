<template>
  <div class="container pb-5">
    <div class="row">
      <div class="col-md-12">
        <h4 class="page-title pull-left"> Dashboard </h4>
        <div class="pull-right">
          <div id="reportrange" class="selectbox">
            <i class="fa fa-calendar"></i>&nbsp;
            <span>August 14, 2019 - August 21, 2019</span> <i class="fa fa-caret-down"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box shadow border-5">
          <span class="info-box-icon bg-aqua"> <i class="now-ui-icons users_circle-08"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Patients</span>
            <span class="info-box-number">90</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-red"><i class='fas fa-user-nurse'></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Nurse</span>
            <span class="info-box-number">41,410</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-green"><i class="now-ui-icons users_single-02"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Physician</span>
            <span class="info-box-number">41,410</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-yellow"><i class="now-ui-icons objects_key-25"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Rooms Available</span>
            <span class="info-box-number">41,410</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
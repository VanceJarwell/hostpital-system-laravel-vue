<template>
    <div class="content">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-title pull-left"> Medical Procedures </h4>
              
              <div class="pull-right">
                <div class="header-btn">
                  <router-link :to="{name: 'procedure_category'}" class="btn btn-main btn-primary mb-30"><i class="fas fa-plus-circle"></i> Add Procedure category </router-link>
                  <a href="#" class="btn btn-mainsec mb-30"> Import </a>
                  <a href="#" class="btn btn-mainsec mb-30"> Export </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- info boxes -->
        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"> <i class="fas fa-diagnoses"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Diagnostic</span>
              <span class="info-box-number">90</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-stethoscope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Therapeutic</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-procedures"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Surgical</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fas fa-syringe"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Anesthesia</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
        </div>

        <div class="col-md-12">
          <div class="row">
              <br>
                  <div class="card">
                    <div class="card-body">
                      <div class="new-product">
                        <div class="row">
                          <div class="col-md-12">
                          <h5 class="title"> Schedule Procedure</h5>
                          
                          <div class="row">
                            <select class="form-control col margin_input" v-model='new_schedule.patient_name'  name ="patient_name" placeholder="Select Patient" > 
                            <option value="" disabled selected>Select Patient</option>
                            <option class="option" v-for="patient in patients" :key="patient.id" :value='patient.id'>{{patient.firstname+' '+patient.lastname}} </option>
                            </select>
                            <select class="form-control col margin_input" v-model='new_schedule.physician_name'  name ="physician_name" placeholder="Select Physician" > 
                            <option value="" disabled selected>Select Physician</option>
                            <option class="option" v-for="physician in physicians" :key="physician.id" :value='physician.id'>{{physician.firstname+' '+physician.lastname}}</option>
                            </select>
                          </div>
                          <div class="row">
                            <select class="form-control col margin_input" v-model='new_schedule.medical_procedure'  name ="medical_procedure" placeholder="Procedure Category" > 
                            <option value="" disabled selected>Select Procedure Category</option>
                            <option class="option" v-for="category in categories" :key="category.id" :value='category.id'>{{category.name}}</option>
                            </select>
                            <input class="form-control col margin_input" type="text" v-model="new_schedule.type_procedure" name='type_procedure' placeholder="Type of Procedure" aria-label="Search">
                          </div>
                          <div class="row">
                            <input class="form-control col margin_input" type="date" v-model="new_schedule.date" name='date' placeholder="Date" aria-label="Search">
                            <input class="form-control col margin_input" type="time" v-model="new_schedule.time" name='time' placeholder="Time" aria-label="Search">
                            <input class="form-control col margin_input" type="text" v-model="new_schedule.room" name='room' placeholder="Room" aria-label="Search">
                          </div>
                          <button class="btn btn-default pull-right"> Cancel</button> 
                          <button href="#" class="btn btn-primary pull-right" @click='addSchedule()'> Save </button> 
                          </div> 
                        </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <!--Calendar-->
        <div class="col-md-12">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="title"> List of Schedules</h4>
                      <!--<Fullcalendar style="width:500px;"/>-->
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="table-info">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Date</th>
                              <th scope="col">Time</th>
                              <th scope="col">Physician</th>
                              <th scope="col">Patient</th>
                              <th scope="col">Procedure Category</th>
                              <th scope="col">Type of Surgery</th>
                              <th scope="col" >Room</th>
                              <th scope="col" >Actions</th>
                            </tr>
                          </thead>
                          <tbody> 
                            <tr v-for="appointment in appointments" :key="appointment.id">
                              <td>{{appointment.id}}</td>
                              <td>{{appointment.date}}</td>
                              <td>{{appointment.time}}</td>
                              <td>{{appointment.physician.firstname +" "+ appointment.physician.lastname}}</td>
                              <td>{{appointment.patients.firstname + " " + appointment.patients.lastname }}</td>
                              <td>{{appointment.medical_procedure}}</td>
                              <td>{{appointment.type_procedure}}</td>
                              <td>{{appointment.room}}</td>
                              <td>
                                <span data-toggle="modal" data-target="#schedule" class="material-icons">print</span>
                                <span v-on:click="deleteSchedule(appointment)" class="material-icons">delete</span>
                                
                              </td>
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
    </div>

</template>

<script>
//import FullCalendar from '@fullcalendar/vue'
export default {
    components: {
    // FullCalendar 
    },
    data() {
      return{
        
        new_schedule:{
        physician_name:'',
        patient_name:'',
        medical_procedure:'',
        type_procedure:'',
        room:'',
        date:'',
        time:'',

        },
        appointments:[],
        categories:[],
        physicians:[],
        patients:[],
        interval:'',
      }
      
    },
    methods: {
      addSchedule(){
        this.$store.dispatch('addSchedule',{data: this.new_schedule})
        .then((data) => {
             this.new_schedule.physician_name='';
             this.new_schedule.patient_name='';
             this.new_schedule.medical_procedure='';
             this.new_schedule.type_procedure='';
             this.new_schedule.room='';
             this.new_schedule.date='';
             this.new_schedule.time='';
            });
        this.$notify({
          text: '<h3 class="text-center mt-2">Added Schedule</h3>',
          type: 'success',
          group: 'alert',
        }); 
        },
      getSchedule(){
        this.$store.dispatch('getSchedule')
        .then(response =>{this.appointments = response})
        console.log(this.appointments)
      },
      deleteSchedule(schedule){
        this.$store.dispatch('deleteSchedule',{data:schedule})
        this.$notify({
          text: '<h3 class="text-center mt-2">Delete Appointment</h3>',
          type: 'success',
          group: 'alert',
        }); 
      },
      getMP_category(){
        this.$store.dispatch('getMP_category')
        .then(response =>{this.categories = response})
      },
      getPhysician(){
        this.$store.dispatch('getPhysician')
        .then(response =>{this.physicians = response})
      },
      getPatient(){
        this.$store.dispatch('getPatient')
        .then(response =>{this.patients = response})
      },
    },
    created(){
      this.getSchedule(),
      this.getMP_category,
      this.getPhysician,
      this.getPatient
    },
    computed:{

    },
    mounted(){
      this.interval = setInterval(this.getSchedule, 3000),
      this.interval = setInterval(this.getMP_category, 4000),
      this.interval = setInterval(this.getPhysician, 5000),
      this.interval = setInterval(this.getPatient, 6000)
    },
    beforeDestroy(){
      clearInterval(this.interval)
    }
}
</script>
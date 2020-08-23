<template>
    <div class="content"> 
        <div class="col-md-12">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="new-product">
                  <div class="row">
                    <div class="col-md-12">
                        <h5 class="title"> Add Patients </h5>
                        <div class="col-md-12">
                            <h6>Personal Info</h6>
                            <div class="row">
                            <input class="form-control col margin_input" type="text" v-model="new_patient.firstname" name='firstname' placeholder="First Name" aria-label="Search">
                            <input class="form-control col margin_input" type="text" v-model="new_patient.lastname" name='lastname' placeholder="Last Name" aria-label="Search">
                            </div>
                            <div class="row">
                            <input class="form-control col margin_input" type="date" v-model="new_patient.birthdate" name='birthdate' placeholder="Birthdate" aria-label="Search">
                            <input class="form-control col margin_input" type="number" v-model="new_patient.age" name='age' placeholder="Age" aria-label="Search">
                            <input class="form-control col margin_input" type="text" v-model="new_patient.gender" name='gender' placeholder="Gender" aria-label="Search">
                            </div>
                            <div class="row">
                            <input class="form-control col margin_input" type="number" v-model="new_patient.weight" name='weight' placeholder="weight(kg)" aria-label="Search">
                            <input class="form-control col margin_input" type="number" v-model="new_patient.height" name='height' placeholder="height(inches)" aria-label="Search">
                            <input class="form-control col margin_input" type="number" v-model="new_patient.phone" name='phone' placeholder="Phone" aria-label="Search">
                            </div>
                            <div class="row">
                            <input class="form-control margin_input" type="text" v-model="new_patient.address" name='address' placeholder="Address" aria-label="Search">
                            </div>
                        
                            <h6>Contact Person Info</h6>
                            <div class="row">
                            <input class="form-control col margin_input" type="text" v-model="new_patient.contact_person" name='contact_person' placeholder="Contact Person Name" aria-label="Search">
                            </div>
                            <div class="row">
                            <input class="form-control col margin_input" type="text" v-model="new_patient.cp_relationship" name='cp_relationship' placeholder="Relationship to the Patient" aria-label="Search">
                            <input class="form-control col margin_input" type="number" v-model="new_patient.cp_phone" name='cp_phone' placeholder="Phone" aria-label="Search">
                            </div>
                            <div class="row">
                            <input class="form-control margin_input" type="text" v-model="new_patient.cp_address" name='cp_address' placeholder="Address" aria-label="Search">
                            </div>
                            <div class="row">
                            <button class="btn btn-default pull-right"> Cancel</button> 
                            <button href="#" class="btn btn-primary pull-right" @click='addPatient()'> Save </button> 
                            </div>
                            </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                    <h5 class="title">List of Patients</h5>
                    <div class="table-responsive">
                        <table class="table">
                          <thead class="table-info">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Birthdate</th>
                              <th scope="col">Age</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                              <th scope="col">Contact Person</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody> 
                            <tr v-for="patient in patients" :key="patient.id">
                              <td>{{patient.id}}</td>
                              <td>{{patient.firstname}}</td>
                              <td>{{patient.lastname}}</td>
                              <td>{{patient.birthdate}}</td>
                              <td>{{patient.age}}</td>
                              <td>{{patient.phone}}</td>
                              <td>{{patient.address}}</td>
                              <td>{{patient.contact_person}}</td>
                              <td data-title="Actions:">
                                <span data-toggle="modal" :value='patient.id' :data-target="'#schedule'+patient.id" class="material-icons">date_range</span>
                                <span v-on:click="deletePatient(patient)" class="material-icons">delete</span>
                                
                                <div class="modal fade" :id ="'schedule'+patient.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">{{patient.firstname}} {{patient.lastname}} Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Date</th>
                                              <th scope="col">Time</th>
                                              <th scope="col">Physician</th>
                                              <th scope="col">Type of Procedure</th>
                                              <th scope="col">Room</th>
                                            </tr>
                                          </thead>
                                          <tbody> 
                                            <tr v-for="appointment in FilteredSched(patient.id)" :key="appointment.id">
                                              <td>{{appointment.date}}</td>
                                              <td>{{appointment.time}}</td>
                                              <td>{{appointment.physician.firstname+' '+appointment.physician.lastname}}</td>
                                              <td>{{appointment.type_procedure}}</td>
                                              <td>{{appointment.room}}</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
    
</template>

<script>
export default {
    data() {
      return{
        new_patient:{
        firstname:'',
        lastname:'',
        birthdate:'',
        age:'',
        gender:'',
        weight:'',
        height:'',
        address:'',
        phone:'',
        contact_person:'',
        cp_relationship:'',
        cp_phone:'',
        cp_address:'',
        },
        patients:[],
        appointments:[],
        interval:'',
      }
      
    },
    methods: {
      addPatient(){
        this.$store.dispatch('addPatient',{data: this.new_patient})
        .then((data) => {
             this.new_patient.firstname='';
             this.new_patient.lastname='';
             this.new_patient.birthdate='';
             this.new_patient.age='';
             this.new_patient.gender='';
             this.new_patient.weight='';
             this.new_patient.height='';
             this.new_patient.address='';
             this.new_patient.phone='';
             this.new_patient.contact_person='';
             this.new_patient.cp_relationship='';
             this.new_patient.cp_phone='';
             this.new_patient.cp_address='';
            });
        this.$notify({
          text: '<h3 class="text-center mt-4">Added Patients</h3>',
          type: 'success',
          group: 'alert',
        });
        event.target.reset();
      },
      getPatient(){
        this.$store.dispatch('getPatient')
        .then(response =>{this.patients = response})
      },
      deletePatient(patient){
        this.$store.dispatch('deletePatient',{data:patient})
        this.$notify({
          text: '<h3 class="text-center mt-2">Delete Patient</h3>',
          type: 'success',
          group: 'alert',
        }); 
      },
      getSchedule(){
        this.$store.dispatch('getSchedule')
        .then(response =>{this.appointments = response})
        console.log(this.appointments)
      },
      FilteredSched(e) {
			       return this.appointments.filter(function(appointment) 
			       {
			       	 if (e==appointment.patient_name){
			       	 	return appointment.id==e
			       	 }
			     	});
			},
    },
    created(){
      this.getPatient(),
      this.getSchedule()
    },
    computed:{

    },
    mounted(){
      this.interval = setInterval(this.getPatient, 3000),
      this.interval = setInterval(this.getSchedule, 3000)
    },
    beforeDestroy(){
      clearInterval(this.interval)
    }
}
</script>
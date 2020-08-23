<template>
    <div class="content">
        <h5>Physicians</h5>
        <div class="col-md-12">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="new-product">
                  <div class="row">
                    <div class="col-md-12">
                    <h5 class="title"> Add Physicians </h5>
                    <div class="col-md-12">
                    <div class="row">
                      <input class="form-control col margin_input" type="text" v-model="new_physician.firstname" name='firstname' placeholder="First Name" aria-label="Search">
                      <input class="form-control col margin_input" type="text" v-model="new_physician.lastname" name='lastname' placeholder="Last Name" aria-label="Search">
                    </div>
                    <div class="row">
                      <select class="form-control col margin_input" v-model='new_physician.department'  name ="borrowed_item" placeholder="Borrowed Item" > 
				    	        <option value="" disabled selected>Select Department</option>
                      <option class="option" v-for='department in departments' :key="department.id">{{department.department_name}}</option>
				              </select>
                      <input class="form-control col margin_input" type="text" v-model="new_physician.specialization" name='specialization' placeholder="Specialization" aria-label="Search">
                    </div>
                    <div class="row">
                      <input class="form-control col margin_input" type="text" v-model="new_physician.email" name='email' placeholder="Email" aria-label="Search">
                      <input class="form-control col margin_input" type="password" v-model="new_physician.password" name='password' placeholder="Password" aria-label="Search">
                      <input class="form-control col margin_input" type="text" v-model="new_physician.phone" name='phone' placeholder="Phone" aria-label="Search">
                    </div>
                    <div class="row">
                      <input class="form-control margin_input" type="text" v-model="new_physician.address" name='address' placeholder="Address" aria-label="Search">
                    </div>
                    <div class="row">
                    <button class="btn btn-default pull-right"> Cancel</button> 
                    <button href="#" class="btn btn-primary pull-right" @click='addPhysician()'> Save </button> 
                    </div>
                    </div> 
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <h5 class="title"> Physicians Data</h5>
                        <div class="table-responsive">
                        <table class="table">
                          <thead class="table-info">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Department</th>
                              <th scope="col">Specialization</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col" >Address</th>
                              <th scope="col" >Actions</th>
                            </tr>
                          </thead>
                          <tbody> 
                            <tr v-for="physician in physicians" :key="physician.id">
                              <td>{{physician.id}}</td>
                              <td>{{physician.firstname}}</td>
                              <td>{{physician.lastname}}</td>
                              <td>{{physician.department}}</td>
                              <td>{{physician.specialization}}</td>
                              <td>{{physician.email}}</td>
                              <td>{{physician.phone}}</td>
                              <td>{{physician.address}}</td>
                              <td>
                                <span data-toggle="modal" :value='physician.id' :data-target="'#schedule'+physician.id" class="material-icons">calendar_today</span>
                                <span v-on:click="deletePhysician(physician)" class="material-icons">delete</span>
                                <div class="modal fade" :id ="'schedule'+physician.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">{{physician.firstname}} {{physician.lastname}} Schedule</h5>
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
                                              <th scope="col">Patient</th>
                                              <th scope="col">Type of Procedure</th>
                                              <th scope="col">Room</th>
                                            </tr>
                                          </thead>
                                          <tbody> 
                                            <tr v-for="appointment in FilteredSched(physician.id)" :key="appointment.id">
                                              <td>{{appointment.date}}</td>
                                              <td>{{appointment.time}}</td>
                                              <td>{{appointment.patients.firstname+' '+appointment.patients.lastname}}</td>
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
    </div>
        
    </div>
</template>

<script>
export default {
    data() {
      return{
        new_physician:{
        firstname:'',
        lastname:'',
        department:'',
        specialization:'',
        email:'',
        password:'',
        phone:'',
        address:'',
        },
        physicians:[],
        appointments:[],
        departments:[],
        interval:'',
      }
      
    },
    methods: {
      addPhysician(){
        this.$store.dispatch('addPhysician',{data: this.new_physician})
        .then((data) => {
             this.new_physician.firstname='';
             this.new_physician.lastname='';
             this.new_physician.department='';
             this.new_physician.specialization='';
             this.new_physician.email='';
             this.new_physician.password='';
             this.new_physician.phone='';
             this.new_physician.address='';
            });
        this.$notify({
          text: '<h3 class="text-center mt-4">Added Physician</h3>',
          type: 'success',
          group: 'alert',
        });
        event.target.reset();
      },
      getPhysician(){
        this.$store.dispatch('getPhysician')
        .then(response =>{this.physicians = response})
        console.log(this.physicians)
      },
      deletePhysician(physician){
        this.$store.dispatch('deletePhysician',{data:physician})
        this.$notify({
          text: '<h3 class="text-center mt-2">Delete Phyisian</h3>',
          type: 'success',
          group: 'alert',
        }); 
      },
      getDepartment(){
        this.$store.dispatch('getDepartmentData')
        .then(response =>{this.departments = response})
      },
      getSchedule(){
        this.$store.dispatch('getSchedule')
        .then(response =>{this.appointments = response})
        console.log(this.appointments)
      },
      FilteredSched(e) {
        return this.appointments.filter(function(appointment) 
          {
            if (e==appointment.physician_name){
            return appointment.id==e
            }
        });
			}
     
    },
    created(){
      this.getPhysician(),
      this.getSchedule,
      this.getDepartment()
    },
    computed:{
     
    },
    mounted(){
      this.interval = setInterval(this.getDepartment, 3000),
      this.interval = setInterval(this.getSchedule, 3000),
      this.interval = setInterval(this.getPhysician, 3000)
    },
    beforeDestroy(){
      clearInterval(this.interval)
    }
}
</script>
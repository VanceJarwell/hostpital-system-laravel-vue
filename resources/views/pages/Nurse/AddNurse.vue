<template>
  <div class="container bg-white border-2 ">
    <h1 class=" text-muted pt-3 pl-2">Add nurse</h1>
    <form class="lead p-2" v-on:submit.prevent="addNurseData()">
      <div class="form-row">
        <div class="form-group">
          <p class="pr-2 pl-1">What department is the nurse assigned:</p>
        </div>
        <div class="form-group">
          <select class="custom-select text-muted shadow-sm" v-model="addToForm" required>
            <option v-for="dept in department" :key="dept.id" :value="{department_name: dept.department_name, department_id: dept.id}" id="deptName">{{dept.department_name}}</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">First name:</label>
          <input type="text" class="form-control shadow-sm" id="firstName" placeholder="First Name" v-model="form.first_name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Last Name:</label>
          <input type="text" class="form-control shadow-sm" id="LastName" placeholder="Last Name" v-model="form.last_name" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Email:</label>
          <input type="email" class="form-control shadow-sm" id="email" placeholder="example@mail.com" v-model="form.email" required> 
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress2">Password:</label>
          <input type="password" class="form-control shadow-sm" id="password" placeholder="Password" v-model="form.password" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Phone number:</label>
          <input type="number" class="form-control shadow-sm" id="number" placeholder="+63" v-model="form.phone_number"> 
        </div>
      </div>
      <label for="address" class="mt-2">Address:</label>
      <div class="form-row text-muted" id="address">
        <div class="form-group col-md-2">
          <label for="inputCity" class="">#</label>
          <input type="number" class="form-control  shadow-sm" id="address" placeholder="#" v-model="address.houseNumber" @change='concatFunction'>
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Barangay</label>
          <input type="text" class="form-control  shadow-sm" placeholder="Barangay" v-model="address.barangay" @change='concatFunction'>
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">City</label>
          <input type="text" id="inputState" class="form-control  shadow-sm" placeholder="City" v-model="address.city" @change='concatFunction' required>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Zip</label>
          <input type="text" class="form-control shadow-sm" id="inputZip" placeholder="Zip code" v-model="address.zip" @change='concatFunction'>
        </div>
      </div>
      <button type="submit" class="btn btn-primary shadow">Add nurse</button>
    </form>
  </div>
</template>

<script>	
	export default {
	    data: function () {
        return {
          form: {
            department_id: '',
            first_name: '',
            last_name: '',
            email: '',
            phone_number: '',
            password: '',
            address: '',
          },
          address: {
            houseNumber: '',
            barangay: '',
            city: '',
            zip: ''
          },
          addToForm :{
          },
          interval: '',
          department:[],

          // INITIAL FORMS
          initialForm: {
            department_id: '',
            first_name: '',
            last_name: '',
            email: '',
            phone_number: '',
            password: '',
            address: '',
          },
          initialAddress: {
            houseNumber: '',
            barangay: '',
            city: '',
            zip: ''
          },
        }
      },
	    methods: {
        concatFunction(){
          this.form.address = '#' + this.address.houseNumber.concat(', ' + this.address.barangay + ', ').concat(this.address.city + ', ' +this.address.zip);
          this.form.department_id = this.addToForm.department_id;
          this.form.department_name = this.addToForm.department_name;
        },

        addNurseData(){
          this.$store.dispatch('addNurseData', {data: this.form})
          this.$notify({
            text: '<h3 class="text-center mt-4">Added Nurse</h3>',
            type: 'success',
            group: 'alert',
          });
          this.form = this.initialForm
          this.address = this.initialAddress
          this.addToForm = ''
        },

        getDepartmentData(){
          this.$store.dispatch('getDepartmentData')
          .then(response => {
            this.department = response;
          })
        },
	    },
      computed:{
        
      },
      created() {
        this.getDepartmentData()
      },
	    mounted(){
        this.interval = setInterval(this.getDepartmentData, 5000)
      },
      beforeDestroy(){
        clearInterval(this.interval)
      }
	}
</script>
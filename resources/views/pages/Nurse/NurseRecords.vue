<template>
  <div class="container"> 
    <div class="table-responsive p-5">
      <h1 class="pt-3">Nurse Records</h1>
      <div class="col-md-4 pb-3">
        <label for="productSearch" class="">Search Filter:</label>
        <input type="text" class="form-control shadow-sm" id="productSearch" placeholder="Search" min=0 v-model="search">
      </div>
      <table class="table shadow">
        <thead class="bg-aqua text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Department</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
          <tr v-for="nurse in filteredRows" :key="nurse.id">
            <th scope="row" data-title="id: ">{{nurse.id}}</th>
            <td data-title="Department: ">{{nurse.department}}</td>
            <td data-title="First Name: ">{{nurse.first_name}}</td>
            <td data-title="Last Name: ">{{nurse.last_name}}</td>
            <td data-title="Email: ">{{nurse.email}}</td>
            <td data-title="Phone Number: ">+63{{nurse.phone_number}}</td>
            <td data-title="Address: ">{{nurse.address}}</td>
            <td><button type="button" class="btn btn-danger p-1" v-on:click="deleteNurse(nurse)">Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>	
	export default {
	    data: function () {
        return {
          interval: '',
          nurses:[],
          search: '',
        }
      },
	    methods: {
        getNurseData(){
          this.$store.dispatch('getNurseData')
          .then(response => {
            this.nurses = response;
          })
        },
        
        deleteNurse(nurse){
          this.$store.dispatch('deleteNurse', {data: nurse})
          this.$notify({
            text: '<h3 class="text-center mt-4">Deleted Nurse</h3>',
            type: 'success',
            group: 'alert',
          });
        }
	    },
      computed:{
        filteredRows(){
          return this.nurses.filter(nurse => {
            const id = nurse.id.toString();
            const department = nurse.department.toLowerCase();
            const first_name = nurse.first_name.toLowerCase();
            const last_name = nurse.last_name.toLowerCase();
            const email = nurse.email.toString().toLowerCase();
            const phone_number = nurse.phone_number.toString();
            const address = nurse.address.toLowerCase();
            const searchTerm = this.search.toLowerCase();
            
            return id.includes(searchTerm) ||
            department.includes(searchTerm) ||
            first_name.includes(searchTerm) ||
            last_name.includes(searchTerm) ||
            email.includes(searchTerm) ||
            phone_number.includes(searchTerm) ||
            address.includes(searchTerm);
          });
        }
      },
      created() {
        this.getNurseData()
      },
	    mounted(){
        this.interval = setInterval(this.getNurseData, 5000)
      },
      beforeDestroy(){
        clearInterval(this.interval)
      }
	}
</script>
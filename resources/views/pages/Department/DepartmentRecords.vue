<template>
  <div class="container"> 
    <div class="table-responsive p-5">
      <h1 class="pt-3">Department Records</h1>
      <div class="col-md-4 pb-3">
        <label for="productSearch" class="">Search Filter:</label>
        <input type="text" class="form-control shadow-sm" id="productSearch" placeholder="Search" min=0 v-model="search">
      </div>
      <table class="table shadow">
        <thead class="bg-aqua text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Building</th>
            <th scope="col">Department Name</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="dept in filteredRows" :key="dept.id">
            <th scope="row" data-title="id: ">{{dept.id}}</th>
            <td data-title="Building: ">{{dept.building}}</td>
            <td data-title="Department Name: ">{{dept.department_name}}</td>
            <td data-title="Description: ">{{dept.description}}</td>
            <td><button type="button" class="btn btn-danger p-1" v-on:click="deleteDepartment(dept)">Delete</button></td>
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
          departments:[],
          search: '',
        }
      },
	    methods: {
        getDepartmentData(){
          this.$store.dispatch('getDepartmentData')
          .then(response => {
            this.departments = response;
          })
        },

        deleteDepartment(dept){
          this.$store.dispatch('deleteDepartment', {data: dept})
          this.$notify({
            text: '<h3 class="text-center mt-4">Deleted Department</h3>',
            type: 'success',
            group: 'alert',
          });
        }
	    },
      computed:{
        filteredRows(){
          return this.departments.filter(department => {
            const id = department.id.toString();
            const building = department.building.toLowerCase();
            const department_name = department.department_name.toLowerCase();
            const searchTerm = this.search;
            
            return id.includes(searchTerm) ||
            building.includes(searchTerm) ||
            department_name.includes(searchTerm);
          });
        }
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
<template>
  <div class="container"> 
    <div class="table-responsive p-5">
      <h1 class="pt-3">Building Records</h1>
      <div class="col-md-4 pb-3">
        <label for="productSearch" class="">Search Filter:</label>
        <input type="text" class="form-control shadow-sm" id="productSearch" placeholder="Search" min=0 v-model="search">
      </div>
      <table class="table shadow">
        <thead class="bg-aqua text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Building Name</th>
            <th scope="col">Floors</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="build in filteredRows" :key="build.id">
            <th scope="row" data-title="id: ">{{build.id}}</th>
            <td data-title="Building Name: ">{{build.building_name}}</td>
            <td data-title="Floors: ">{{build.floors}}</td>
            <td><button type="button" class="btn btn-danger p-1" v-on:click="deleteBuilding(build)">Delete</button></td>
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
          buildings:[],
          search: ''
        }
      },
	    methods: {
        getBuildingData(){
          this.$store.dispatch('getBuildingData')
          .then(response => {
            this.buildings = response;
          })
        },

        deleteBuilding(building){
          this.$store.dispatch('deleteBuilding', {data: building})
          this.$notify({
            text: '<h3 class="text-center mt-4">Deleted Building</h3>',
            type: 'success',
            group: 'alert',
          });
        }
	    },
      computed:{
        filteredRows(){
          return this.buildings.filter(building => {
            const id = building.id.toString();
            const building_name = building.building_name.toLowerCase();
            const floors = building.floors.toString().toLowerCase();
            const searchTerm = this.search;
            
            return id.includes(searchTerm) ||
            building_name.includes(searchTerm) ||
            floors.includes(searchTerm);
          });
        }
       
      },
      created() {
        this.getBuildingData()
      },
	    mounted(){
        this.interval = setInterval(this.getBuildingData, 5000)
      },
      beforeDestroy(){
        clearInterval(this.interval)
      }
	}
</script>
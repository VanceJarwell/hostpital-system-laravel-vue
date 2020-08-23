<template>
  <div class="container bg-white border-1 shadow-lg pb-5 mb-5">
    <h1 class="mt-5 text-muted pt-3 pl-2">Add Building</h1>
    <form class="lead p-2" v-on:submit.prevent="addBuildingData()">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Building name:</label>
          <input type="text" class="form-control shadow-sm" id="buildingName" placeholder="Building Name" v-model="form.building_name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">How many floors does this building have:</label>
          <input type="number" class="form-control shadow-sm" id="floors" placeholder="Number of floors" v-model="form.floors">
        </div>
      </div>
      <button type="submit" class="btn btn-primary warn">Submit</button>
    </form>
  </div>
</template>

<script>	
	export default {
	    data: function () {
        return {
          form: {
            building_name: '',
            floors: '',
          },
        }
      },
	    methods: {
        addBuildingData(){
          this.$store.dispatch('addBuildingData', {data: this.form})
          this.$notify({
            text: '<h3 class="text-center mt-4">Added Building</h3>',
            type: 'success',
            group: 'alert',
          });
          event.target.reset()
        },
	    },
      computed:{
        
      },
      created() {
        
      },
	    mounted(){
        
	    },
	}
</script>
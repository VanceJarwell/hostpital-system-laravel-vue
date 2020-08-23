<template>
  <div class="container bg-white border-1 shadow-lg pb-5 mb-5">
    <h1 class="mt-5 text-muted pt-3 pl-2">Add Department</h1>
    <form class="lead p-2" v-on:submit.prevent="addDepartmentData()">
      <div class="form-row">
        <div class="form-group">
          <p class="pr-2 pl-1">What building is this department located:</p>
        </div>
        <div class="form-group">
          <select class="custom-select text-muted shadow-sm mr-5" v-model="form.building_id">
            <option v-for="build in building" :key="build.id" :value="build.id">{{build.building_name}}</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Department name:</label>
          <input type="text" class="form-control shadow-sm" id="departmentName" placeholder="Department Name" v-model="form.department_name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="description">Description:</label>
          <textarea class="form-control shadow-sm" id="description" rows="3" v-model="form.description"></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>	
	export default {
	    data: function () {
        return {
          form: {
            building_id: '',
            department_name: '',
            description: ''
          },
          interval: '',
          building:[]
        }
      },
	    methods: {
        addDepartmentData(){
          this.$store.dispatch('addDepartmentData', {data: this.form})
          this.$notify({
            text: '<h3 class="text-center mt-4">Added Department</h3>',
            type: 'success',
            group: 'alert',
          });
          event.target.reset()
        },
        getBuildingData(){
          this.$store.dispatch('getBuildingData')
          .then(response => {
            this.building = response;
          })
        },
	    },
      computed:{
        
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
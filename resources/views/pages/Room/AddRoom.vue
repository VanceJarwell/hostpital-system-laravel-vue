<template>
  <div class="container bg-white border-1 shadow-lg pb-5 mb-5">
    <h1 class="mt-5 text-muted pt-3 pl-2">Add Room</h1>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active lead" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add Single Room</a>
      </li>
      <li class="nav-item">
        <a class="nav-link lead" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add Multiple Room</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <form class="lead p-2" v-on:submit.prevent="addSingleRoomData()">
          <div class="form-row">
            <div class="form-group">
              <p class="pr-2 pl-1">What building is this room located:</p>
            </div>
            <div class="form-group">
              <select class="custom-select text-muted shadow-sm mr-5" v-model="singleform.building_id">
                <option v-for="build in building" :key="build.id" :value="build.id">{{build.building_name}}</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Room Number:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="Room number" v-model="singleform.room_number">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Floor Number:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="Floor number" v-model="singleform.floor_number">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Room type:</label>
              <select class="custom-select text-muted shadow-sm" v-model="singleform.room_type">
                <option selected=true>Private</option>
                <option>Ward</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Number of beds:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="Number of beds" v-model="singleform.beds">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>  
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <form class="lead p-2" v-on:submit.prevent="addMultipleRoomDate()">
          <div class="form-row">
            <div class="form-group">
              <p class="pr-2 pl-1">What building is this room located:</p>
            </div>
            <div class="form-group">
              <select class="custom-select text-muted shadow-sm mr-5" v-model="multipleForm.building_id">
                <option v-for="build in building" :key="build.id" :value="build.id">{{build.building_name}}</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputEmail4">From room:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="From this room" v-model="room_additional">
            </div>
            <div class="form-group col-md-3">
              <label for="inputEmail4">To:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="To this room" v-model="multipleForm.room_number">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Floor Number:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="Floor number" v-model="multipleForm.floor_number">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Room type:</label>
              <select class="custom-select text-muted shadow-sm" v-model="multipleForm.room_type">
                <option selected=true>Private</option>
                <option>Ward</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Number of beds:</label>
              <input type="number" class="form-control shadow-sm" id="departmentName" placeholder="Number of beds" v-model="multipleForm.beds">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    
  </div>
</template>

<script>	
	export default {
	    data: function () {
        return {
          singleform: {
            building_id: '',
            floor_number: '',
            room_number: '',
            room_type: '',
            beds: '',
            availability: 1
          },
          multipleForm: {
            building_id: '',
            floor_number: '',
            room_number: '',
            room_type: '',
            beds: '',
            availability: 1
          },
          interval: '',
          room_additional: 0,
          building:[],
        }
      },
	    methods: {
        addSingleRoomData(){
          this.$store.dispatch('addRoomData', {data: this.singleform})
          this.$notify({
            text: '<h3 class="text-center mt-4">Added Room</h3>',
            type: 'success',
            group: 'alert',
          });
          event.target.reset()
        },
        addMultipleRoomDate(){
          var ctr = 1
          while(ctr < this.multipleForm.room_number + 1){
            this.$store.dispatch('addRoomData', {data: this.multipleForm})
            this.multipleForm.room_number -= ctr
            console.log("boi delay")
          }
          this.$notify({
            text: '<h3 class="text-center mt-4">Added Room</h3>',
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
        clearForm(){
          this.form.building_id = ''
          this.form.floor_number = ''
          this.form.room_number = ''
          this.form.room_additional = ''
          this.form.room_type = ''
          this.form.beds = ''
          this.form.availability = ''
        }
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
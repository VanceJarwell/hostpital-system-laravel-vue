<template>
  <div class="container"> 
    <div class="table-responsive p-5 ">
      <h1 class="pt-3">Room Records</h1>
      <div class="col-md-4 pb-3">
        <label for="productSearch" class="">Search Filter:</label>
        <input type="text" class="form-control shadow-sm" id="productSearch" placeholder="Search" min=0 v-model="search">
      </div>
      <table class="table shadow">
        <thead class="bg-aqua text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Building</th>
            <th scope="col">Room Number</th>
            <th scope="col">Beds</th>
            <th scope="col">Availability</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody class="">
          <tr v-for="room in filteredRows" :key="room.id">
            <th scope="row" data-title="id: ">{{room.id}}</th>
            <td data-title="Building: ">{{room.building}}</td>
            <td data-title="Room Number: ">{{room.room_number}}</td>
            <td data-title="Beds: ">{{room.beds}}</td>
            <td data-title="Availability: ">Available</td>
            <td><button type="button" class="btn btn-danger p-1" v-on:click="deleteRoom(room)">Delete</button></td>
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
          rooms:[],
          search: '',
        }
      },
	    methods: {
        getRoomData(){
          this.$store.dispatch('getRoomData')
          .then(response => {
            this.rooms = response;
          })
        },

        deleteRoom(room){
          this.$store.dispatch('deleteRoom', {data: room})
          this.$notify({
            text: '<h3 class="text-center mt-4">Deleted Room</h3>',
            type: 'success',
            group: 'alert',
          });
        }
	    },
      computed:{
        filteredRows(){
          return this.rooms.filter(room => {
            const id = room.id.toString();
            const building = room.building.toLowerCase();
            const floor_number = room.floor_number.toString().toLowerCase();
            const room_number = room.room_number.toString().toLowerCase();
            const room_type = room.room_type.toString().toLowerCase();
            const beds = room.beds.toString().toLowerCase();
            const availability = room.availability.toString().toLowerCase();
            const searchTerm = this.search.toLowerCase();
            
            return id.includes(searchTerm) ||
            building.includes(searchTerm) ||
            floor_number.includes(searchTerm) ||
            room_number.includes(searchTerm) ||
            room_type.includes(searchTerm) ||
            beds.includes(searchTerm) ||
            availability.includes(searchTerm);
          });
        }
      },
      created() {
        this.getRoomData()
      },
	    mounted(){
        this.interval = setInterval(this.getRoomData, 5000)
      },
      beforeDestroy(){
        clearInterval(this.interval)
      },
	}
</script>
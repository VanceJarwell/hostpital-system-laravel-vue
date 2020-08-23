<template>
    <div class="content">
        <h5>Medical Procedures</h5>
        <div class="col-md-12">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <div class="new-product">
                  <div class="row">
                    <div class="col-md-12">
                    <h5 class="title"> Add Medical Procedure Category</h5>
                    <div class="col-md-12">
                    <div class="row">
                      <input class="form-control col margin_input" type="text" v-model="new_category.name" name='name' placeholder="Category Name" aria-label="Search">
                    </div>
                    <div class="row">
                      <input class="form-control col margin_input" type="textarea" v-model="new_category.description" name='description' placeholder="Description" aria-label="Search">
                    </div>
                    <button class="btn btn-default pull-right"> Cancel</button> 
                    <button href="#" class="btn btn-primary pull-right" @click='addMP_category()'> Save </button> 
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
                <div class="new-product">
                  <div class="row">
                    <div class="col-md-12">
                      <h5 class="title"> List of Category</h5>
                        <div class="table-responsive">
                        <table class="table">
                          <thead class="table-info">
                            <tr>
                              <th scope="col">Department Name</th>
                              <th scope="col">Description</th>
                            </tr>
                          </thead>
                          <tbody> 
                            <tr v-for="category in categories" :key="category.id">
                              <td>{{category.name}}</td>
                              <td>{{category.description}}</td>
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

</template>
<script>
export default {
    data() {
      return{
        new_category:{
        name:'',
        description:'',
        },
        categories:[],
        interval:''
      }
      
    },
    methods: {
      addMP_category(){
        this.$store.dispatch('addMP_category',{data: this.new_category})
        .then((data) => {
             this.new_category.name='';
                this.new_category.description='';
            });
        this.$notify({
          text: '<h3 class="text-center mt-2">Added Category</h3>',
          type: 'success',
          group: 'alert',
        }); 
        },
      getMP_category(){
        this.$store.dispatch('getMP_category')
        .then(response =>{this.categories = response})
      }
    },
    created(){
      this.getMP_category()
    },
    computed:{

    },
    mounted(){
      this.interval = setInterval(this.getMP_category, 3000)
    },
    beforeDestroy(){
      clearInterval(this.interval)
    }
}
</script>
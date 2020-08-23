<template>
    <div class="wrap fade-animate" id="myDiv">
      <div class="login-page">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6">
              <div class="right-login text-center">
                <div class="login-form-data">
                  <h1>Hospital</h1>
                  <h3> Login to your account </h3>
                  <form @submit.prevent="login">
                    <div class="form-group required">
                      <input type="email" id="loginform-email" class="form-control" v-model="form.username" aria-required="true" placeholder="Email" required autofocus>
                    </div>

                    <div class="form-group required">
                      <input type="password" id="loginform-password" class="form-control" v-model="form.password" aria-required="true" placeholder="Password" autocoplete="current-password" required>
                    </div>

                    <div class="password-options">
                      <div class="form-group text-left">
                        <label><input type="checkbox" class="input-checkbox mb-4" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked> Remember Me</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-login width-100 btn-style" name="login-button-modal" v-if="!isLogging">Login</button>       
                      <button type="submit" class="btn btn-login width-100 btn-style" name="login-button-modal" v-else disabled>Checking your credentials</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-xl-8 col-lg-6 col-md-6">
              <div class="left-login">
                <div class="login-desc">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="info-desc">
                      <!-- <img src="/assets/img/online-shop.png"> -->
                      <div class="info">
                        <!-- <h5> Easy and time saving </h5>
                        <p> We enable customers to easily order via our website and mobile app.</p> -->
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <!-- <div class="info-desc">
                      <img src="/assets/img/time.png">
                      <div class="info">
                        <h5> Fresh and Best Quality </h5>
                        <p> We take pride in delivering only the freshest of produce to your doorstep.  </p>
                      </div> -->
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <!-- <div class="info-desc">
                      <img src="/assets/img/satisfaction.png">
                      <div class="info">
                        <h5> Satisfaction guaranteed </h5>
                        <p> We ensure that all orders dispatched to your home will be to the highest standard and quality. </p>
                      </div> -->
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <!-- <div class="info-desc">
                      <img src="/assets/img/truck.png">
                      <div class="info">
                        <h5> Flexible Time Delivery </h5>
                        <p> You can choose what day we deliver you the goods. </p>
                      </div> -->
                    </div>
                  </div>
                  </div>
                </div>
              </div> 

              <div class="left-login-footer">
                <ul class="list-inline">
                  <!-- <li class="white-text">&copy; 2019 Fresh Buys PH — All Rights Reserved.   </li>
                  <li><a class="white-text" href="termsandconditions.html">Terms and Conditions</a></li>
                  <li><a class="white-text" href="privacypolicy.html">Privacy Policy</a></li> -->
                </ul>  
              </div><!-- end of left-login-footer -->
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    data() {
      return {
        form:{username: '',
          password: '',
        },        
        isLogging: false,
        message: null,
      }
    },
    methods: {
      login(){
        this.message = null,
        this.isLogging = true
        this.$store.dispatch('loginUser',{data: this.form}).then(response=>{
          this.$router.push({name: 'home'})
        },error=>{
        console.log('error')
          this.isLogging = false
          this.$notify({
            text: '<i class="material-icons">cancel</i> Invalid username and/or password.',
            type: 'error',
            group: 'alert',
            });
        })
      }
    },
}
</script>
<!-- <script>
import Layout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
 
const props = defineProps(['user']);
</script>


<template>
    <div>
       <form @submit="formSubmit">
    
     
           <div class="d-grid">
             <button v-if="show" type="submit" class="btn btn-success mt-3">Apply</button>
           </div>

       
    
    </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                show: true
            }
        }
    }
</script> -->


<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">Apply Component</div>

              <div class="card-body">
                  I'm the Apply Component component.
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

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
</script>

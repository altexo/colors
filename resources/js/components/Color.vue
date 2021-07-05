<template>

  <div class="card">
    <div class="card-body" >
      <p class="text-muted"> {{ year }}   
        <span class="float-right"  v-if="this.role === 1">
              <router-link :to="{ name: 'editColor', params: {color_id: id} }" >
          <button class="btn btn-link btn-sm">
            <i class="bi bi-pencil-square"></i>
          </button>
              </router-link>
            <button class="btn btn-link btn-sm" @click="deleteColor">
          <i class="bi bi-trash"></i>
             </button>
        </span>
      </p>
    
      <h6 class="card-subtitle mb-2 text-muted text-center" :style="textStyle">{{ colorName }}</h6>
      <p class="card-text text-center" >
        {{ colorHex }}
      </p>
      <p class="text-muted text-right mb-0">
          {{ pantone }}
      </p>
    
    </div>
    
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: "Color",

  props: {
    id: { type: Number, default: null },
    colorName: { type: String, default: null },
    colorHex: { type: String, default: null },
    pantone: { type: String, default: null },
    year: { type: Number, default: null },
    

  },

  data(){
    return {
      role: this.$store.state.auth.user.role_id,
    }
     
  },

    computed: {

      textStyle () {
        return 'color: '+ this.colorHex + '!important';
      }
    },

  methods: {
    deleteColor(){
      axios.delete('/api/colores/' + this.id)
      .then(response => {
        if (response.data.success === true){
           this.$emit('deleted', this.id)
        }
      })
      .catch(err => console.log('err: ', err))
    } 
  }
};
</script>

<style>
.card-body{
    padding: 5px;
    height: 150px;
}

.card{
    border-radius: 15px;
}
</style>
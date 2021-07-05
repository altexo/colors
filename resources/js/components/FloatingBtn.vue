<template>
 <router-link :to="{ name: route }">
  <button type="button" class="btn btn-primary btn-circle btn-xl"><i class="bi bi-plus-lg"></i>
                            </button>
 </router-link>
</template>

<script>
export default {
     name: 'FloatingBtn',
     props:{
         route : { type: String, default: null }, 
     }
}
</script>

<style>
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

</style>
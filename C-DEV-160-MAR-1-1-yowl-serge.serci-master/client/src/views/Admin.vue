<template>
  <div class="Admin">
    <div class="flex justify-center">
      <img alt="Vue logo" src="../assets/picto.png" />
    </div>
    <div class="flex justify-center space-x-2">
      <div><ModalKPI /></div>
    </div>
  </div>
</template>

<script>
import ModalKPI from "@/components/ModalKPI.vue";

export default {
  name: "Admin",

  components: {
    ModalKPI,
  },
};
</script>

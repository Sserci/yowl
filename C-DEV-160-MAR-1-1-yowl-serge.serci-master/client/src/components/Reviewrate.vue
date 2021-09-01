<template>
  <div>
    <Staricon
      v-for="star in [1, 2, 3, 4, 5]"
      :key="star"
      class="w-full h-full text-gray-400 fill-current"
      :class="{
        'text-yellow-300': star <= rate,
        'cursor-pointer transition-all transform hover:scale-150': isEditable,
      }"
      @click="isEditable ? $emit('update', star) : null"
    />
  </div>
</template>

<script>
import Staricon from "./Staricon.vue";
export default {
  components: { Staricon },
  props: {
    rate: { type: Number, default: 0 },
    isEditable: { type: Boolean, default: false },
  },
};
</script>

<style></style>

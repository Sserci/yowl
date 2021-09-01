<template>
  <div>
    <button
      class="
        p-10
        px-3
        py-3
        text-2xl text-gray-700
        placeholder-gray-400
        bg-gray-200
        border-0
        rounded-lg
        shadow
        font
        focus:outline-none focus:ring
        hover:bg-gray-300
      "
      style="transition: all 0.15s ease 0s"
      @click="$emit('catupdate', category.id)"
    >
      <p class="ml-20 mr-20">{{ category.name }}</p>
    </button>
  </div>
</template>

<script>
export default {
  props: ["category", "catupdate"],
  data() {
    return {
      isActive: false,
    };
  },
};
</script>

<style></style>

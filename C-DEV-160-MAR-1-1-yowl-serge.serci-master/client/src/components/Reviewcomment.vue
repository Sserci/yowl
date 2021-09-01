<template>
  <div
    class="
      grid grid-flow-col grid-rows-2
      gap-4
      bg-blue-100
      border-0 border-b border-gray-300 border-solid
    "
  >
    <div class="w-12 h-12 row-span-3">
      <img
        class="border border-gray-100 rounded-full shadow-sm"
        src="https://randomuser.me/api/portraits/women/81.jpg"
      />
    </div>
    <div class="flex justify-between col-span-1">
      <div>
        <div class="text-justify">{{ comment.user_id }}</div>
        <div class="text-justify">{{ comment.created_at }}</div>
      </div>
      <div>
        <img class="h-12" src="/picto.png" />
      </div>
    </div>

    <div>
      <div class="text-justify">
        {{ comment.content }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comment"],
  data() {
    return {
      comments: [{}],
      content: "",
      reviews: "",
      created_at: "",
    };
  },
  mounted() {},
};
</script>

<style></style>

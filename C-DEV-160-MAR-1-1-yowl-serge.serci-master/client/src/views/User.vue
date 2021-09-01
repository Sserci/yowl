<template>
  <div class="User">
    <PageUser msg="Ceci est la page User" />
  </div>
</template>

<script>
import PageUser from "@/components/PageUser.vue";

export default {
  name: "User",
  components: {
    PageUser,
  },
};
</script>

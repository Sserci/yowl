<template>
  <div>
    <div class="hello"></div>
    <input
      type="text"
      v-model="search"
      placeholder="search"
      class="h-10 border-4 border-black rounded-full w-96"
    />
    <div class="grid grid-cols-5 gap-2 mt-8 ml-32 mr-32 gris-rows 1">
      <button
        class="m-4 border-4 rounded-full"
        type="button"
        v-for="category in categories"
        :key="category"
      >
        {{ category.name }}
      </button>
    </div>
    <div class="grid grid-cols-1 gap-2 mt-8 ml-32 mr-32 gris-rows 3">
      <div
        type="text"
        class="w-auto h-32 border-4 rounded-2xl"
        v-for="review in reviews"
        :key="review"
      >
        <router-link :to="`/review/${review.id}`"
          ><img :src="review.photo" class="h-20"
        /></router-link>
        <div>{{ review.title }}</div>
        <div>{{ review.rate }}</div>
        <Reviewrate></Reviewrate>
      </div>
    </div>
  </div>
</template>

<script>
import Reviewrate from "./Reviewrate.vue";
export default {
  component: { Reviewrate },
  name: "HelloWorld",
  props: {
    msg: String,
    data() {
      return {
        rate: 0,
        description: this.description,
        url: this.url,
        title: this.title,
        review: [{}],
      };
    },
    components: {
      Reviewrate,
    },
  },

  methods: {
    updateNote(star) {
      this.rate = star;
    },
  },
  data() {
    return {
      categories: [{}],
      reviews: [{}],
    };
  },
  mounted() {
    this.$axios
      .get("/categories")
      .then((response) => {
        this.categories = response.data;
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });
    this.$axios
      .get("/reviews")
      .then((response) => {
        this.reviews = response.data;
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });
  },
};
</script>

<style scoped></style>

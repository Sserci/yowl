<template>
  <div class="pb-20 pl-20 pr-20" v-if="reviews">
    <div>
      <div class="flex justify-between">
        <div>
          <div class="grid grid-cols-6 gap-4">
            <h1
              class="col-start-1 col-end-2 text-2xl font-semibold text-justify"
            >
              {{ reviews.title }}
            </h1>
            <h1 class="flex col-start-2 col-end-5 text-justify">
              <Reviewrate
                class="flex space-x-1 h-9"
                @update="updateNote"
                :rate="reviews.rate"
                :isEditable="false"
              />
            </h1>
            <h1 class="col-start-1 col-end-3 text-lg font-medium text-justify">
              Publie par {{ reviewsuser.name }} le
              {{ reviews.created_at }}
            </h1>
          </div>
          <br />
        </div>
        <div class="flex">
          <img class="h-16" src="/picto.png" />
        </div>
      </div>
    </div>

    <div>
      <carousel :items-to-show="4.5">
        <slide v-for="slide in 1" :key="slide">
          <a :href="this.reviews.url" target="_blank"
            ><img class="w-5/6 rounded-lg" :src="reviews.photo"
          /></a>
        </slide>

        <template #addons>
          <navigation />
          <pagination />
        </template>
      </carousel>
    </div>
    <div>
      <img
        id="test"
        class="w-10 cursor-pointer"
        :src="imgSrc"
        @click="imgClicked = !imgClicked"
      />
    </div>
    <br /><br />
    <div>
      <h2 class="text-2xl font-semibold text-justify">Description</h2>
      <br />
    </div>
    <div>
      <p class="text-justify">
        {{ reviews.description }}
      </p>
    </div>
    <div><br /><br /></div>

    <div class="grid grid-cols-6 gap-4">
      <h2 class="col-start-1 col-end-2 text-2xl font-semibold text-justify">
        Commentaires
      </h2>
      <h1 class="col-start-2 col-end-3 text-justify">nb comment</h1>
    </div>
    <br />
    <div>
      <Reviewcomment
        v-for="comment in reviews.comments"
        :key="comment.id"
        :comment="comment"
      ></Reviewcomment>
      <div>
        <h4 class="flex w-full">Ajouter un commentaire</h4>
        <textarea
          v-model="content"
          class="
            grid grid-flow-col grid-rows-2
            gap-4
            border-0 border-b border-gray-300 border-solid
            w-full
          "
        ></textarea>
        <button @click="createcomment()">Poster</button>
      </div>
    </div>
  </div>
</template>

<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import Reviewcomment from "./Reviewcomment.vue";
import Reviewrate from "./Reviewrate.vue";

export default {
  data() {
    return {
      imgClicked: false,
      image1: "/coeur_vide.png",
      image2: "/coeur_plein.png",
      rate: 0,
      reviews: {},
      title: "",
      comments: [{}],
      user: [{}],
      name: "",
      index: [{}],
      reviewsuser: {},
      review: {},
    };
  },

  mounted() {
    console.log(this.$route.params.id);
    this.$axios
      .get(`/reviews/${this.$route.params.id}`)
      .then((response) => {
        this.reviews = response.data;
        console.log(response.data);
      })
      .catch(function (error) {
        console.log(error);
      });
    this.$axios
      .get(`/reviews/${this.$route.params.id}`)
      .then((response) => {
        this.reviewsuser = response.data.user;
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });
    /* this.readcomments(); */
  },

  computed: {
    imgSrc: function () {
      return this.imgClicked ? this.image2 : this.image1;
    },
  },

  methods: {
    /*     readcomments() {
      this.$axios
        .get(`/reviews/${this.$route.params.id}`)
        .then((response) => {
          this.comments = response.data.comments;
          console.log(JSON.stringify(response.data));
        })
        .catch(function (error) {
          console.log(error);
        });
    }, */
    createcomment() {
      this.$axios
        .post("/comments", {
          content: this.content,
          reviews_id: this.$route.params.id,
        })
        .then((response) => {
          this.comments = response.data.comments;
          window.location.reload();
          console.log(JSON.stringify(response.data));
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  name: "App",
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
    Reviewcomment,
    Reviewrate,
  },
};
</script>

<style></style>

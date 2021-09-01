<template>
  <div>
    <div class="flex items-start">
      <textarea
        class="
          bg-transparent
          resize-none
          hover:bg-gray-200
          focus:outline-none
          focus:ring-2
          focus:bg-gray-300
          focus:ring-opacity-50
        "
        v-model="this.content"
        placeholder="Ajoutez un commentaire"
        v-on:keyup.enter="sendComment()"
      />
      <button
        type="button"
        @click.prevent="sendComment()"
        class="p-1 font-medium text-black rounded"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </button>
      <br />
    </div>
    <div>
      <br />
    </div>
    <div>
      <div>
        <br />
      </div>
      <div>
        <br />
      </div>
    </div>
  </div>
</template>

<script>
var axios = require("axios");

export default {
  mounted() {},
  components: { Comments },
  name: "comment",
  props: [
    "comment",
    "comment.id",
    "comment.post",
    "deletePost(comment.id)",
    "post",
    "post.id",
    "idp",
    "updateCom",
  ],
  data() {
    return { content: [], comments: {} };
  },

  methods() {
    this.$axios.post("/comments/", {
      content: this.content,
    });
    then((response) => {
      this.comments = response.data.comments;
      console.log(JSON.stringify(response.data));
    }).catch(function (error) {
      console.log(error);
    });
  },
};
</script>

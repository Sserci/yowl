<template>
  <div>
    <div>
      <button
        type="button"
        v-on:click="toggleModal()"
        class="
          flex
          justify-center
          w-full
          px-3
          py-3
          text-2xl text-gray-700
          placeholder-gray-400
          bg-gray-200
          border-0
          rounded-full
          shadow
          focus:outline-none focus:ring focus:bg-gray-300
          hover:bg-gray-300
        "
        style="transition: all 0.15s ease 0s"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-8 h-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 4v16m8-8H4"
          />
        </svg>
      </button>
      <div
        v-if="showModal"
        class="
          fixed
          inset-0
          z-50
          items-center
          justify-center
          overflow-x-hidden overflow-y-auto
          rounded-t
          outline-none
          top-72
          focus:outline-none
          border-blueGray-200
        "
      >
        <div class="relative w-auto max-w-2xl mx-auto my-3">
          <div
            class="
              relative
              flex flex-col
              bg-gray-100
              rounded-lg
              shadow-lg
              outline-none
              focus:outline-none
            "
          >
            <div
              class="p-5 border-b border-solid rounded-t border-blueGray-200"
            >
              <div
                class="flex items-start justify-between text-3xl font-semibold"
              >
                <div>Categorie</div>
                <button
                  class="
                    float-right
                    p-1
                    ml-auto
                    text-3xl
                    font-semibold
                    leading-none
                    text-black
                  "
                  v-on:click="toggleModal()"
                >
                  <span
                    class="
                      block
                      w-6
                      h-6
                      text-2xl text-black
                      outline-none
                      focus:outline-none
                    "
                  >
                    X
                  </span>
                </button>
              </div>
            </div>
            <div
              class="p-5 border-b border-solid rounded-t border-blueGray-200"
            >
              <div class="flex items-start text-3xl font-semibold">
                <input
                  class="
                    w-full
                    text-xl
                    bg-transparent
                    resize-none
                    hover:bg-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:bg-gray-300
                    focus:ring-opacity-50
                  "
                  v-model="name"
                  placeholder="Nouvelle categorie"
                  v-on:keyup.enter="sendCategory(), toggleModal()"
                />
                <button v-on:click="sendCategory(), toggleModal()">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 mr-1 text-green-800"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 13l4 4L19 7"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        v-if="showModal"
        class="fixed inset-0 z-40 bg-black opacity-25"
      ></div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["category", "category.id", "getAllC"],
  name: "modal",
  data() {
    return {
      showModal: false,
    };
  },
  methods: {
    toggleModal: function () {
      this.showModal = !this.showModal;
    },

    async sendCategory() {
      try {
        await this.$axios
          .post("/categories/", {
            name: this.name,
          })
          .then(() => {
            this.getAllC();
            console.log(this.name);
          });
      } catch (err) {
        console.error(err);
      }
    },
  },
};
</script>

<style></style>

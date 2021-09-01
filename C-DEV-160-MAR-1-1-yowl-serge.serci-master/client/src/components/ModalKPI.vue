<template>
  <div>
    <button
      class="
        px-6
        py-3
        mb-1
        mr-1
        text-sm
        font-bold
        text-black
        uppercase
        transition-all
        duration-150
        ease-linear
        rounded
        shadow
        outline-none
        active:bg-pink-600
        hover:shadow-lg
        focus:outline-none
      "
      type="button"
      v-on:click="toggleModal()"
    >
      KPI
    </button>

    <div
      v-if="showModal"
      class="
        fixed
        inset-0
        z-50
        flex
        items-center
        justify-center
        overflow-x-hidden overflow-y-auto
        outline-none
        focus:outline-none
      "
    >
      <div class="relative w-auto max-w-6xl mx-auto my-6">
        <!--content-->
        <div
          class="
            relative
            flex flex-col
            w-full
            bg-white
            border-0
            rounded-lg
            shadow-lg
            outline-none
            focus:outline-none
          "
        >
          <!--header-->
          <div
            class="
              flex
              items-start
              justify-between
              p-5
              border-b border-solid
              rounded-t
              border-blueGray-200
            "
          >
            <h3 class="text-3xl font-semibold">Modal Title</h3>
            <button
              class="
                float-right
                p-1
                ml-auto
                text-3xl
                font-semibold
                leading-none
                text-black
                bg-transparent
                border-0
                outline-none
                opacity-5
                focus:outline-none
              "
              v-on:click="toggleModal()"
            >
              <span
                class="
                  block
                  w-6
                  h-6
                  text-2xl text-black
                  bg-transparent
                  outline-none
                  opacity-5
                  focus:outline-none
                "
              >
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative flex-auto p-6">
            <p class="my-4 text-lg leading-relaxed text-blueGray-500">
              Nombre total d'utilisateurs : {{ users }}
            </p>
            <p class="my-4 text-lg leading-relaxed text-blueGray-500">
              Nombre total de reviews : {{ reviews }}
            </p>
          </div>
          <!--footer-->
          <div
            class="
              flex
              items-center
              justify-end
              p-6
              border-t border-solid
              rounded-b
              border-blueGray-200
            "
          >
            <button
              class="
                px-6
                py-3
                mb-1
                mr-1
                text-sm
                font-bold
                text-red-500
                uppercase
                transition-all
                duration-150
                ease-linear
                bg-transparent
                border border-red-500 border-solid
                rounded
                outline-none
                hover:bg-red-500 hover:text-white
                active:bg-red-600
                focus:outline-none
              "
              type="button"
              v-on:click="toggleModal()"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="fixed inset-0 z-40 bg-black opacity-25"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
      users: [{}],
      reviews: [{}],
    };
  },
  mounted() {
    this.$axios
      .get("/count/users")
      .then((response) => {
        this.users = response.data;
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });
    this.$axios
      .get("/count/reviews")
      .then((response) => {
        this.reviews = response.data;
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });
  },
  methods: {
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
  },
};
</script>

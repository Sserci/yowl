<template>
  <div class="pb-20 pl-20 pr-20">
    <div>
      <div>
        <div>
          <div class="flex justify-between">
            <div class="font-semibold text-2xl m-2">Lien URL de l'objet</div>
            <img class="h-12" src="/picto.png" />
          </div>
          <br />
          <div class="w-full flex flex-row-reverse">
            <input
              class="
                border-0
                px-3
                py-3
                placeholder-gray-400
                text-gray-700
                bg-gray-200
                rounded-lg
                text-lg
                shadow
                focus:outline-none focus:ring
                w-11/12
                hover:bg-gray-300
              "
              v-model="url"
              placeholder="URL"
              style="transition: all 0.15s ease 0s"
            />
          </div>
        </div>
        <br />
        <div>
          <div class="w-full">
            <div class="flex flex-wrap mt-6">
              <div class="w-1/2 text-left font-semibold text-2xl">Titre</div>
              <div class="w-1/2 text-center font-semibold text-2xl">Note</div>
            </div>
          </div>

          <div class="w-full">
            <div class="flex flex-wrap mt-6">
              <div class="w-1/2 text-left font-semibold text-lg">
                <div class="w-full flex flex-row-reverse">
                  <input
                    class="
                      border-0
                      px-3
                      py-3
                      placeholder-gray-400
                      text-gray-700
                      bg-gray-200
                      rounded-lg
                      text-lg
                      shadow
                      focus:outline-none focus:ring
                      w-10/12
                      hover:bg-gray-300
                    "
                    v-model="title"
                    placeholder="Titre"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
              </div>
              <div class="w-1/2 flex justify-end font-semibold text-lg">
                <Reviewrate
                  class="h-12 flex space-x-3"
                  @update="updateNote"
                  :rate="rate"
                  :isEditable="true"
                />
              </div>
            </div>
          </div>
        </div>
        <br />
        <div>
          <div class="flex justify-between">
            <div class="font-semibold text-2xl m-2">Description</div>
          </div>
          <br />
          <div class="w-full flex flex-row-reverse">
            <input
              class="
                border-0
                px-3
                py-3
                placeholder-gray-400
                text-gray-700
                bg-gray-200
                rounded-lg
                text-lg
                shadow
                focus:outline-none focus:ring
                w-11/12
                hover:bg-gray-300
              "
              v-model="description"
              placeholder="Description"
              style="transition: all 0.15s ease 0s"
            />
          </div>
        </div>
        <div class="w-full">
          <div class="flex flex-wrap mt-6">
            <div
              class="
                flex
                gap-4
                w-1/2
                text-left
                font-semibold
                text-lg
                justify-end
              "
            >
              <div class="w-10/12 gap-8 flex flex-row">
                <button
                  class="
                    border-0
                    px-3
                    py-3
                    placeholder-gray-400
                    text-gray-700
                    bg-gray-200
                    rounded-lg
                    text-2xl
                    font-bold
                    shadow
                    focus:outline-none focus:ring
                    w-10/12
                    hover:bg-gray-300
                  "
                  style="transition: all 0.15s ease 0s"
                >
                  Bold
                </button>
                <button
                  class="
                    border-0
                    px-3
                    py-3
                    placeholder-gray-400
                    text-gray-700
                    bg-gray-200
                    rounded-lg
                    text-2xl
                    italic
                    shadow
                    focus:outline-none focus:ring
                    w-10/12
                    hover:bg-gray-300
                  "
                  style="transition: all 0.15s ease 0s"
                >
                  Italique
                </button>
                <button
                  class="
                    border-0
                    px-3
                    py-3
                    placeholder-gray-400
                    text-gray-700
                    bg-gray-200
                    rounded-lg
                    text-2xl
                    shadow
                    focus:outline-none focus:ring
                    w-10/12
                    hover:bg-gray-300
                  "
                  style="transition: all 0.15s ease 0s"
                >
                  Regular
                </button>
              </div>
            </div>
            <div class="w-1/2 flex justify-end font-semibold text-lg">
              <label
                >File
                <input
                  type="file"
                  id="file"
                  ref="file"
                  @change="onFileselected"
                />
              </label>
            </div>
          </div>
        </div>
        <br />
        <div>
          <div class="flex justify-between">
            <div class="font-semibold text-2xl m-2">Categorie</div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="flex flex-wrap w-full gap-4">
      <div class="flex flex-wrap gap-4 pl-40">
        <Categorieproduit
          v-for="category in categories"
          :key="category.id"
          :category="category"
          @catupdate="categoryupdate"
          @onclick="findcategory_id()"
        />
      </div>
    </div>
    <div class="flex flex-row-reverse">
      <Modaladdcategorie :getAllC="getAllCategories" :title="title" />
    </div>
    <br />
    <div class="flex flex-row-reverse">
      <button
        class="
          w-1/6
          px-3
          py-3
          text-2xl text-gray-700
          placeholder-gray-400
          bg-green-400
          border-0
          rounded-lg
          shadow
          focus:outline-none focus:ring
          hover:bg-green-700 hover:text-white
        "
        style="transition: all 0.15s ease 0s"
        @click="postReview()"
      >
        Valider
      </button>
    </div>
  </div>
</template>

<script>
import Categorieproduit from "../components/Categorieproduit.vue";
import Modaladdcategorie from "../components/Modaladdcategorie.vue";
import Reviewrate from "../components/Reviewrate.vue";

export default {
  name: "Creationproduit",
  components: { Reviewrate, Categorieproduit, Modaladdcategorie },
  data() {
    return {
      rate: 0,
      isActive: false,
      categories: [{}],

      description: this.description,
      url: this.url,
      title: this.title,
      photo: this.fd,
      selectedFile: null,
      category_id: this.category_id,
    };
  },
  mounted() {
    this.getAllCategories();
  },
  methods: {
    categoryupdate(key) {
      this.category_id = key;
      console.log(this.category_id);
    },
    async getAllCategories() {
      await this.$axios
        .get("/categories/")
        .then((response) => {
          this.categories = response.data;
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    updateNote(star) {
      this.rate = star;
    },
    onFileselected(event) {
      this.selectedFile = event.target.files[0];
    },

    async postReview() {
      const fd = new FormData();
      fd.append("image", this.selectedFile, this.selectedFile.name);

      try {
        await this.$axios.post("/reviews/", {
          rate: this.rate,
          title: this.title,
          description: this.description,
          url: this.url,
          photo: "/" + this.selectedFile.name,
          category_id: this.category_id,
        });
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>

<style></style>

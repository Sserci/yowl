<template>
  <div>
    <div class="container h-full px-4 mx-auto">
      <div class="flex items-center content-center justify-center h-full">
        <div class="w-full px-4 lg:w-4/12">
          <div
            class="
              relative
              flex flex-col
              w-full
              max-w-md
              min-w-0
              p-4
              mb-6
              break-words
              bg-gray-100
              border-0
              rounded-lg
              shadow-md
            "
          >
            <div class="px-6 py-6 mb-0 rounded-t">
              <div>
                <img class="w-32 mx-auto" src="/picto.png" />
              </div>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
              <div class="mb-3 font-bold text-center text-gray-500">
                <small>Inscription</small>
              </div>
              <form @submit.prevent="register">
                <div class="relative w-full mb-3">
                  <input
                    v-model="name"
                    type="name"
                    class="
                      w-full
                      px-3
                      py-3
                      text-sm text-gray-700
                      placeholder-gray-400
                      bg-white
                      border-0
                      rounded
                      shadow
                      focus:outline-none focus:ring
                    "
                    placeholder="Pseudo"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
                <div class="relative w-full mb-3">
                  <input
                    v-model="email"
                    type="email"
                    class="
                      w-full
                      px-3
                      py-3
                      text-sm text-gray-700
                      placeholder-gray-400
                      bg-white
                      border-0
                      rounded
                      shadow
                      focus:outline-none focus:ring
                    "
                    placeholder="Email"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
                <div class="relative w-full mb-3">
                  <input
                    type="text"
                    class="
                      w-full
                      px-3
                      py-3
                      text-sm text-gray-700
                      placeholder-gray-400
                      bg-white
                      border-0
                      rounded
                      shadow
                      focus:outline-none focus:ring
                    "
                    v-model="birthday"
                    placeholder="Date de naissance"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
                <div class="relative w-full mb-3">
                  <input
                    type="password"
                    class="
                      w-full
                      px-3
                      py-3
                      text-sm text-gray-700
                      placeholder-gray-400
                      bg-white
                      border-0
                      rounded
                      shadow
                      focus:outline-none focus:ring
                    "
                    placeholder="Mot de passe"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
                <div class="relative w-full mb-3">
                  <input
                    v-model="password"
                    type="password"
                    class="
                      w-full
                      px-3
                      py-3
                      text-sm text-gray-700
                      placeholder-gray-400
                      bg-white
                      border-0
                      rounded
                      shadow
                      focus:outline-none focus:ring
                    "
                    placeholder="Confirmez votre mot de passe"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>

                <div>
                  <label class="inline-flex items-center cursor-pointer"
                    ><input
                      id="customCheckLogin"
                      type="checkbox"
                      class="
                        w-5
                        h-5
                        ml-1
                        text-gray-800
                        border-0
                        rounded
                        form-checkbox
                      "
                      style="transition: all 0.15s ease 0s"
                    /><span class="ml-2 text-sm font-semibold text-gray-700"
                      >Se souvenir de moi</span
                    ></label
                  >
                </div>
                <div class="mt-6 text-center">
                  <button
                    class="
                      w-full
                      px-6
                      py-3
                      mb-1
                      mr-1
                      text-sm
                      font-bold
                      text-white
                      uppercase
                      bg-green-600
                      rounded
                      shadow
                      outline-none
                      active:bg-green-900
                      hover:bg-green-900 hover:shadow-lg
                      focus:outline-none
                    "
                    @click="register()"
                    type="button"
                    style="transition: all 0.15s ease 0s"
                  >
                    Inscription
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-wrap mt-6 justify-content">
            <div class="mx-auto">
              <button
                class="
                  inline-flex
                  items-center
                  px-4
                  py-2
                  mb-1
                  mr-2
                  text-xs
                  font-bold
                  text-gray-800
                  uppercase
                  bg-white
                  rounded
                  shadow
                  outline-none
                  active:bg-gray-100
                  focus:outline-none
                  hover:shadow-md
                "
                type="button"
                style="transition: all 0.15s ease 0s"
              >
                <a href="/login">Connexion</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "register-page",
  data: () => {
    return {
      name: "",
      email: "",
      password: "",
      birthday: "",
    };
  },
  methods: {
    async register() {
      try {
        if (!this.name && !this.password && !this.email && !this.birthday) {
          return;
        }

        const { data } = await this.$axios.post("/register", {
          name: this.name,
          email: this.email,
          password: this.password,
          birthday: this.birthday,
        });

        localStorage.setItem("yowl-token", data.access_token);
        this.$axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${data.access_token}`;
        this.$router.push("/");
        console.log(data);
      } catch (err) {
        console.log(err);
      }
    },
  },
  components: {},
};
</script>
<style></style>

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
              <div class="mb-3 text-center">
                <h6 class="text-sm font-bold text-gray-600">Connexion avec</h6>
              </div>
              <div class="text-center btn-wrapper">
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
                  <img
                    alt="..."
                    class="w-5 mr-1"
                    src="/github.svg"
                  />Github</button
                ><button
                  class="
                    inline-flex
                    items-center
                    px-4
                    py-2
                    mb-1
                    mr-1
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
                  <img alt="..." class="w-5 mr-1" src="/google.svg" />Google
                </button>
              </div>
              <hr class="mt-6 border-gray-400 border-b-1" />
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
              <form>
                <div class="relative w-full mb-3">
                  <label
                    class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                    for="grid-password"
                    >Email</label
                  ><input
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
                    v-model="email"
                    placeholder="Email"
                    style="transition: all 0.15s ease 0s"
                  />
                </div>
                <div class="relative w-full mb-3">
                  <label
                    class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                    for="grid-password"
                    >Mot de passe</label
                  ><input
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
                    v-model="password"
                    placeholder="Mot de passe"
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
                    @click="login()"
                    type="button"
                    style="transition: all 0.15s ease 0s"
                  >
                    Connexion
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-wrap mt-6">
            <div class="w-1/2">
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
                <a href="/forgot_password">Mot de passe oublie?</a>
              </button>
            </div>
            <div class="w-1/2 text-right cursor-pointer">
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
                <a href="/register"> Cree un nouveau compte </a>
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
  name: "login-page",
  data: () => {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async login() {
      try {
        if (!this.email && !this.password) {
          return;
        }

        const { data } = await this.$axios.post("/login", {
          email: this.email,
          password: this.password,
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

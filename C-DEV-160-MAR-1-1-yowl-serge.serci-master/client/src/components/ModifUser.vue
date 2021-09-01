<template>
  <div>
    <div class="container h-full px-4 mx-auto">
      <div class="flex items-center content-center justify-center h-full">
        <div
          class="relative flex flex-col w-full max-w-md min-w-0 p-4 mb-6 break-words bg-gray-100 border-0 rounded-lg shadow-md "
        >
          <div class="px-6 py-6 mb-0 rounded-t">
            <div>
              <img class="w-32 mx-auto" src="/picto.png" />
            </div>
          </div>
          <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
            <form>
              <div class="relative w-full mb-3">
                <input
                  type="name"
                  class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow  focus:outline-none focus:ring"
                  placeholder="Pseudo"
                  style="transition: all 0.15s ease 0s"
                />
              </div>
              <div class="relative w-full mb-3">
                <input
                  type="email"
                  class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow  focus:outline-none focus:ring"
                  placeholder="Email"
                  style="transition: all 0.15s ease 0s"
                />
              </div>
              <div class="relative w-full mb-3">
                <input
                  type="password"
                  class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow  focus:outline-none focus:ring"
                  placeholder="Nouveau Mot de passe"
                  style="transition: all 0.15s ease 0s"
                />
              </div>
              <div class="relative w-full mb-3">
                <input
                  type="password"
                  class="w-full px-3 py-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow  focus:outline-none focus:ring"
                  placeholder="Confirmez votre mot de passe"
                  style="transition: all 0.15s ease 0s"
                />
              </div>
            </form>
          </div>

          <div class="flex flex-col mt-6 justify-content">
            <div>
              <h2 class="pl-4 text-2xl font-semibold text-justify">
                Petite introduction
              </h2>
            </div>
            <div>
              <textarea rows="10" class="w-full text-justify">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non
                risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing
                nec, ultricies sed, dolor. Cras elementum ultrices diam.
                Maecenas ligula massa, varius a, semper congue, euismod non, mi.
                Proin porttitor, orci nec nonummy molestie, enim est eleifend
                mi, non fermentum diam nisl sit amet erat. Duis semper. Duis
                arcu massa, scelerisque vitae, consequat in, pretium a, enim.
                Pellentesque congue. Ut in risus volutpat libero pharetra
                tempor.
              </textarea>
            </div>

            <div class="mx-auto mt-6 text-center">
              <button
                class="w-full px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase bg-green-600 rounded shadow outline-none  active:bg-green-900 hover:bg-green-900 hover:shadow-lg focus:outline-none"
                type="button"
                style="transition: all 0.15s ease 0s"
              >
                Modifier mon profil
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script></script>
<style></style>

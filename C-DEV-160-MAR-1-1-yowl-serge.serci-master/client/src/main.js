import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./index.css";

import Axios from "axios";

const axios = Axios.create({
  baseURL: "http://127.0.0.1:8181/api",
});

const token = localStorage.getItem("yowl-token");
if (token) {
  axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
}

/* axios.interceptors.response.use(undefined, function (err) {
  if (err.response.status === 401) {
    localStorage.removeItem("yowl-token");
    this.$router.push("/login");
  }
  return Promise.reject(err);
}); */

const app = createApp(App);
app.use(store);
app.use(router);
app.config.globalProperties.$axios = axios;
app.mount("#app");

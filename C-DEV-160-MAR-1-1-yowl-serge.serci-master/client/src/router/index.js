import { createRouter, createWebHistory } from "vue-router";

import Reviewid from "../views/Reviewid.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Accueil from "../views/Accueil.vue";
import Admin from "../views/Admin.vue";
import User from "../views/User.vue";
import ModifUser from "../components/ModifUser.vue";
import Creationproduit from "../views/Creationproduit.vue";

const isNotAuthenticated = (to, from, next) => {
  if (!localStorage.getItem("yowl-token")) {
    next();
    return;
  }
  next("/");
};

const isAuthenticated = (to, from, next) => {
  if (localStorage.getItem("yowl-token")) {
    next();
    return;
  }
  next("/login");
};

const routes = [
  {
    path: "/review/:id",
    name: "Reviewid",
    component: Reviewid,
    beforeEnter: isAuthenticated,
  },
  {
    path: "/creation",
    name: "Creationproduit",
    component: Creationproduit,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    beforeEnter: isNotAuthenticated,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    beforeEnter: isNotAuthenticated,
  },
  {
    path: "/",
    name: "Accueil",
    component: Accueil,
    beforeEnter: isAuthenticated,
  },
  {
    path: "/admin",
    name: "Admin",
    component: Admin,
  },
  {
    path: "/user",
    name: "User",
    component: User,
  },
  {
    path: "/user/:id",
    name: "Userid",
    component: User,
  },
  {
    path: "/modifuser",
    name: "ModifUser",
    component: ModifUser,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

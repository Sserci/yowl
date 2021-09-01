<template>
  <div id="nav">
    <router-link to="/register">Register</router-link> |
    <router-link to="/login">Login</router-link> |
    <router-link to="/">Accueil</router-link> |
    <router-link to="/user">User</router-link> |
    <router-link to="/creation">Creation</router-link> |
    <router-link to="/admin">Admin</router-link> |
    <button @click="logout()"><b>Logout</b></button>
  </div>
  <router-view />
</template>

<script>
export default {
  methods: {
    logout() {
      localStorage.removeItem("yowl-token");
      this.$router.push("/login");
    },
  },
};
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>

<template>
<!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="margin-left: 30px; margin-right: 15px;">
    <a class="navbar-brand" href="#">Profile</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <router-link to="/" class="nav-link">
            Home
        </router-link>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto" style="margin-left: 10px; margin-right: 55px;">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ app.user ? app.user.name : 'Account' }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <div v-if="!app.user">
              <router-link to="/login" class="dropdown-item">Login</router-link>
              <router-link to="/register" class="dropdown-item">Register</router-link>
          </div>
          <a v-else @click="logout" href="javascript:;" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>    
<!-- </div>   -->
</template>

<script>
export default {
    name: "nav",
    props: ["app"],
    data() {
        return{};
    },
    methods: {
        logout() {
            this.app.req.post("auth/logout").then(() => {
                this.app.user = null;
                this.$router.push("/login");
            });
        }
    }
}
</script>

<style>

</style>
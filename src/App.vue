<template>
  <div id="app">
    <img src="./assets/coco.png" alt="Logo" class="logo">
    <button @click="toggleMenu" class="menu-toggle">☰</button>
    <nav :class="{ 'nav-links': true, 'show': showMenu }">
      <ul :class="{ 'centered': showMenu }">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/CUser">Crear paciente</router-link></li>
        <li><router-link to="/lUser">Lista usuarios</router-link></li>
        <li><router-link to="/sUser">Buscar usuario</router-link></li>
      </ul>
    </nav>
    <router-view/>
  </div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  position: relative;
}

.logo {
  position: absolute; 
  top: 0%; 
  left: 2%; 
  width: 5%; 
  height: auto; 
}

nav {
  padding: 2%;
  background: linear-gradient(to right, #6b6b6b, #ffffff);
  text-align: right; 
}

.nav-links {
  display: none; 
}
.nav-links.show {
  display: block; 
}

.nav-links ul {
  list-style: none;
  padding: 0;
}

.nav-links ul li {
  display: inline; 
  margin: 0 1%; 
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

.menu-toggle {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 1.5em;
  cursor: pointer;
}
.centered {
  text-align: center; /* Centra los elementos de la lista horizontalmente */
}
</style>

<script>
export default {
  data() {
    return {
      showMenu: false
    };
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu;
    }
  }
};
</script>
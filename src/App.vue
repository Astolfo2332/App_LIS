<template>
  <div id="app">
    <div class="sidebar" :class="{ 'show': showMenu }">
      <ul>
        <li><router-link to="/" class="menu-link">Home</router-link></li>
        <li><router-link to="/CUser" class="menu-link">Crear paciente</router-link></li>
        <li><router-link to="/lUser" class="menu-link">Lista usuarios</router-link></li>
        <li><router-link to="/sUser" class="menu-link">Buscar usuario</router-link></li>
      </ul>
    </div>
    <button @click="toggleMenu" class="menu-toggle" :class="{ 'show': showMenu }">☰</button>
    <img src="./assets/coco.png" alt="Logo" class="logo" :class="{ 'show': showMenu }">
    <router-view />
  </div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #503d2c;
  position: relative;
}

.logo {
  position: absolute;
  top: 0%;
  right: 2%;
  width: 5%;
  height: auto;
  
}

.menu-toggle {
  position: absolute;
  top: 10px;
  left: 2%; 
  font-size: 1.5em;
  cursor: pointer;
  z-index: 2;
}
.centered {
  text-align: center;
}

.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 14%; 
  height: 100%;
  background: linear-gradient(to right, #70b3e0, #ffffff);
  transition: transform 0.5s ease-in-out;
  transform: translateX(-100%);
}
.sidebar ul li a {
  font-size: 1.2em; 
  color: #121212; 
  text-decoration: none; 
}
.sidebar ul li a:hover{
  color:rgb(0, 122, 36) ;
}
.sidebar ul li a.router-link-exact-active{
  color: rgb(0, 122, 36) ;
  font-weight: bold;
}

.sidebar.show {
  transform: translateX(0);
}

.sidebar ul {
  list-style: none;
  padding: 10% 0%;
}

.sidebar ul li {
  margin: 5% 0;
}

.menu-toggle.show {
  left: 13.4%; 
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
<template>
  <div class="home">
    <div class="background-image" :style="{ backgroundImage: 'url(' + fondox + ')' }"></div>
    <div class="icon-container">
      <a @click="goToCreatePatient" class="icon">
        <img src="../assets/icono11.png" alt="Create Patient">
        <h2>Create Patient</h2>
        <p class="descripcion">Crear un nuevo paciente</p>
      </a>
      <a @click="goToListUsers" class="icon">
        <img src="../assets/icono22.png" alt="List Users">
        <h2>List Users</h2>
        <p class="descripcion">Ver la lista de usuarios</p>
      </a>
      <a @click="goToSearchUser" class="icon">
        <img src="../assets/icon3.png" alt="Search User">
        <h2>Search User</h2>
        <p class="descripcion">Buscar un usuario específico</p>
      </a>
    <div class="copyright-container">
      <div class="copyright">
        &copy; 2023 maicenaScript. Todos los derechos reservados.
      </div>
    </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fondox: require('../assets/fon2.avif'),
    };
  },
  methods: {
    goToCreatePatient() {
      this.$router.push('/CUser');
    },
    goToListUsers() {
      this.$router.push('/lUser');
    },
    goToSearchUser() {
      this.$router.push('/sUser');
    }
  }
};
</script>

<style>
.home {
  text-align: center;
}

.background-image {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background-size: cover;
  background-position: center;
}

.icon-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 5vh; /* Puedes ajustar este valor para cambiar la posición vertical */
}

.icon {
  margin: 5vw 5vw; /* Otra opción puede ser usar porcentajes como 5% */
  cursor: pointer;
  text-decoration: none;
  color: rgb(75, 24, 244);
}

.icon h2 {
  margin: 5px 0;
}

.icon p {
  margin: 5px 0;
}

.icon:hover {
  opacity: 0.9;
  transform: scale(1.2); /* Esto hace que la imagen crezca al pasar el mouse sobre ella */
  color: rgb(0, 88, 29);
  font-weight: bold;
}

.icon img {
  width: 13vw; /* Usa vw o porcentajes en lugar de píxeles */
  height: auto;
}
.copyright-container {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 115px;
    background-color: #70b3e0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .copyright {
    color: white;
  }
</style>
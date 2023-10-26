<template>
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Consultar resultados</h2>
            <form>
             
              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="documentUser" required/>
                <label class="form-label" for="form3Example4">Documento de Identidad</label>
              </div>
              <button type="submit" class="btn btn-primary btn-block mb-4" @click="searchId">
                Buscar
              </button>
              <button type="reset" class="btn btn-danger btn-block mb-4">
                Limpiar
              </button>

        
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="../assets/dibujo2.png" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</template>

<style scoped>

  .card {
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(159, 1, 1, 0.2);
    border-radius: 10px;
  }

  .form-control {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(75, 75, 75, 0.1); 
  }
  section {
  background-image: url('../assets/consultar.png');
  background-size: cover;
  background-position: center;
}


  @media (min-width: 992px) {
    .cascading-right {
      margin-right: 50px;
    }
  }
</style>
<script>
export default {
    data(){
        return {
            userid:[],
        }
    },
    created:function(){
    },
    methods:{
    searchId(){
            const url="https://localhost/lis/?consultaridoc="+this.documentUser
            fetch(url)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                if (datosRespuesta.success==0){
               
                alert("Usuario no encontrado")
                }
                else {
               console.log(datosRespuesta)
               this.userid=datosRespuesta[0].id 
                this.$router.push({ path: `/rUser${this.userid}` })    
            }
            })
            .catch(console.log)
        }




   }

}
</script>
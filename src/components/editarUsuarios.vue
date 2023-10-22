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
            <h2 class="fw-bold mb-5">Crear usuario</h2>
            <form>
            <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" v-model="user.name" required/>
                    <label class="form-label" for="form3Example1">Nombres</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" v-model="user.lastname" required/>
                    <label class="form-label" for="form3Example2">Apellidos</label>
                  </div>
                </div>
              </div>
              
              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.doc" required/>
                <label class="form-label" for="form3Example4">Documento de Identidad</label>
              </div>

              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.age" required/>
                <label class="form-label" for="form3Example4">Edad</label>
              </div>

              <div class="form-outline mb-4">
                <select class='form-select'  id="form3Example4" v-model="user.genre" required>
                  <option v-for="gender in genders" :key=" gender " :value=" gender "> {{ gender }} </option>
                </select>
                <label class="form-label" for="form3Example4"> Género </label>
              </div>


              <div class="form-outline mb-4">
                <select class='form-select'  id="form3Example4" v-model="user.eps" required>
                  <option v-for="eps in epss" :key="eps.id" :value="eps.id"> {{ eps.name }} </option>
                </select>
                <label class="form-label" for="form3Example4"> Eps </label>
              </div>


              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.tp " required/>
                <label class="form-label" for="form3Example4">Tp</label>
              </div>


              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model=" user.ptt " required/>
                <label class="form-label" for="form3Example4">Ptt</label>
              </div>

              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.atiii" required/>
                <label class="form-label" for="form3Example4">Atii</label>
              </div>


              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.tt" required/>
                <label class="form-label" for="form3Example4">Tt</label>
              </div>

              <div class="form-outline mb-4">
                <input type="tel" id="form3Example4" class="form-control" v-model="user.fibrinogeno" required/>
                <label class="form-label" for="form3Example4">Fibrogeno</label>
              </div>

              <button type="submit" class="btn btn-primary btn-block mb-4" @click="updateUser">
               Actualizar
              </button>
              <button type="reset" class="btn btn-danger btn-block mb-4">
                Limpiar
              </button>

        
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="../assets/coco.png" class="w-100 rounded-4 shadow-4"
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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }

  .form-control {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(75, 75, 75, 0.1); 
  }

  @media (min-width: 992px) {
    .cascading-right {
      margin-right: 50px;
    }
  }
</style>
<script>
export default{
  data(){
        return {
            genders:["Masculino","Femenino","Helicoptero"]
            ,epss:[]
            ,user:{}
        }
    },
    created:function(){
       this.getEps()
       this.getUserid() 
    },
methods:{
       updateUser(){

    
      const name= encodeURIComponent(this.nameUser)
      const lastname=encodeURIComponent(this.lastnameUser)
      const document= encodeURIComponent(this.documentUser)
      const age= encodeURIComponent(this.age)
      const gender=encodeURIComponent(this.Gender) 
      const eps=encodeURIComponent(this.epsName)  
      const tp=encodeURIComponent(this.tp)
      const ptt=encodeURIComponent(this.ptt)
      const atii=encodeURIComponent(this.atii)
      const tt=encodeURIComponent(this.tt)
      const fibrogeno=encodeURIComponent(this.Fibrogeno) 
      let enviar={
        "doc":document,
        "name":name,
        "lastname":lastname,
        "age":age,
        "genre":gender,
        "eps":eps,
        "tp":tp,
        "ptt":ptt,
        "atiii":atii,
        "tt": tt,
        "fibrinogeno": fibrogeno
    }
    console.log(enviar)
     fetch('https://localhost/lsi/?insertar=1',{
                method:"POST",
                body:JSON.stringify(enviar)
            })
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta=>{
                console.log(datosRespuesta);
            }))
            .catch((error=>{console.error("Error:",error);alert("Paso algo no sé que fue")})) 
    },
      getEps(){
        fetch('https://localhost/lis/?consultarEps')
        .then(respuesta=>respuesta.json())
                  .then((datosRespuesta)=>{
                      console.log(datosRespuesta)
                      this.epss=[]
                      if(typeof datosRespuesta[0].success==='undefined'){
                          this.epss=datosRespuesta;
                      }

                  })
                  .catch(console.log)
    },
    getUserid(){
        const url='https://localhost/lis/?consultar='+this.$route.params.id
        fetch(url)
         .then(respuesta=>respuesta.json())
                  .then((datosRespuesta)=>{
                      console.log(datosRespuesta)
                      this.user=[]
                      if(typeof datosRespuesta[0].success==='undefined'){
                          this.user=datosRespuesta[0];
                      }

                  })
                  .catch(console.log)






    }

    
}
}



</script>
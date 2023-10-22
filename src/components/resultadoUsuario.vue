<template>
    <div class="container">
        <div class="p-5 bg-image" style="
        background-image: url('https://tinyurl.com/5du55a95');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
        <div class="card">
            <div class="card-header">
            Resultados de usuario con id: {{this.$route.params.id}} <br>
            Nombre: {{ this.user.name +" "+ this.user.lastname }}<br>
            Documento: {{ this.user.doc }}<br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tp</th>
                            <th>Ptt</th>
                            <th>Atiii</th>
                            <th>Tt</th>
                            <th>Fibrinogeno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td scope="row">{{this.$route.params.id}}</td>
                            <td>{{this.user.tp}}</td>
                            <td>{{this.user.ptt}}</td>
                            <td>{{this.user.atiii}}</td>
                            <td>{{this.user.tt}}</td>
                            <td>{{this.user.fibrinogeno}}</td>
                        </tr>
                   <button @click="goBack" class="btn btn-info">Regresar</button> 
                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer text-muted">
                Copyright: maicenaScript 2023
            </div>
        </div>
    </div>
        </div>
</template>

<script>
export default {
    data(){
        return {
            user:{}
        }
    },
    created:function(){
        this.getUserid()
    },
    methods:{
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
    },
    goBack(){
        this.$router.go(-1)
    }
   }
}
</script>
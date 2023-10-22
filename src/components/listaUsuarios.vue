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
                Lista de usuarios
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documemnto</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th>Tp</th>
                            <th>Ptt</th>
                            <th>Atiii</th>
                            <th>Tt</th>
                            <th>Fibrinogeno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="usuario in usuarios" :key="usuario.id">
                            <td scope="row">{{usuario.id}}</td>
                            <td>{{usuario.name}}</td>
                            <td>{{usuario.lastname}}</td>
                            <td>{{usuario.doc}}</td>
                            <td>{{usuario.age}}</td>
                            <td>{{usuario.genre}}</td>
                            <td>{{getEps(usuario.eps)}}</td>
                            <td>{{usuario.tp}}</td>
                            <td>{{usuario.ptt}}</td>
                            <td>{{usuario.atiii}}</td>
                            <td>{{usuario.tt}}</td>
                            <td>{{usuario.fibrinogeno}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                     <router-link :to="{name:'editUser', params:{id:usuario.id}}" class="btn btn-info">Editar</router-link> 
                                    <button type="button" v-on:click="DeleteUser(usuario.id)" class="btn btn-danger">Borrar</button>
                                </div>
                            </td>
                        </tr>
                        
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
            usuarios:[]
        }
    },
    created:function(){
        this.getUsers()
    },
    methods:{
        getUsers(){
            const url ="https://localhost/lis/"
           fetch(url)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.usuarios=[]
                if(datosRespuesta){
                    this.usuarios=datosRespuesta
                    console.log(datosRespuesta)
                }

            })
            .catch(console.log)
        },
        DeleteUser(id){
            const url="https://localhost/lis/?borrar="+id
            fetch(url)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
            if (datosRespuesta.success==1){
                alert("Usuario eliminado exitosamente")
                window.location.href="/"
            }
            else{
                alert("Hubo un problema")
            }
            })
            .catch(console.log)
        },
        getEps(id){
            const url="https://localhost/lis/?consularEpsid="+id
            fetch(url)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                return datosRespuesta
            })
            .catch(console.log)


        }

    }
}
</script>
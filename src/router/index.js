import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CUser from "../components/crearUsuario.vue"
import lUser from "../components/listaUsuarios.vue"
import eUser from "../components/editarUsuarios.vue"
import rUser from "../components/resultadoUsuario.vue"
import sUser from "../components/busquedaUsuario.vue"

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/CUser',
    name: 'CreateUser',
    component: CUser
  },
  {
    path: '/lUser',
    name: 'listUsers',
    component: lUser
  },
  {
    path: '/eUser:id',
    name: 'editUser',
    component: eUser
  },
  {
    path: '/rUser:id',
    name: 'resUser',
    component: rUser
  },
  {
    path: '/sUser',
    name: 'serUser',
    component: sUser
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router

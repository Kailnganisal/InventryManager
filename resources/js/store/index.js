import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
    state:{
        authUser:''
    },
    mutations:{
        getAuthUser(state,user){
            state.authUser = user
        }

    },
    actions:{
        authUser({commit}){
            return new Promise((resolve ,reject)=>{
                axios.get('/getauthuser')
                    .then((response)=>{
                        let user = response.data
                        commit('getAuthUser',user);
                        resolve(response)
                    }).catch((error)=>{
                        console.log(error);
                })
            })
        }
    },

    getters: {
        authUser: state => {
            return state.authUser
        }
    }
})

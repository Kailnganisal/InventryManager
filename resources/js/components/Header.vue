<template>
    <nav class="flex items-center justify-between bg-gray-900 w-screen">
        <div class="ml-10">
           <router-link to="/Store">
               <h1 class="text-2xl text-center text-yellow-100 font-black">{{text}}</h1>
           </router-link>

        </div>


        <div class="mr-5 mt-2 mb-2">

            <label v-show="isShowLogin" class="text-sm text-yellow-100 underline mx-2">{{this.currentUser}}</label>

            <router-link to="/register">
                <button class="bg-yellow-400 text-sm text-center underline rounded-full p-1 m-0.5" v-if="!isShowLogin">
                    Register
                </button>
            </router-link>

            <router-link to="/home">
                <button class="bg-yellow-400 text-sm text-center underline rounded-full p-1 m-0.5" v-if="isShowLogin">
                    Home
                </button>
            </router-link>

            <router-link to="/login">
                <button class="bg-yellow-400 text-sm text-center underline rounded-full p-1 m-0.5" v-if="!isShowLogin">
                    Login
                </button>
            </router-link>


            <button @click="logout" class="bg-yellow-400 text-sm text-center underline rounded-full p-1 m-0.5" v-if="isShowLogin">logout</button>
        </div>
    </nav>
</template>


<script>

export default {
    name: "Header",
    props:{
        text:String,

    },
    data(){
        return {
            isShowLogin : false,
            currentUser: ''
        }
    },

    async created() {

        await this.$store.dispatch('authUser')
        console.log("UserName" + JSON.stringify(this.$store.state.authUser.username))
        let authUser = this.$store.state.authUser
        if (Object.keys(authUser).length === 0) {
            this.isShowLogin = false

        } else {
            this.isShowLogin = true
            this.currentUser = authUser.username
        }

    },

    methods: {
        logout() {
            this.axios.post('/logout')
                .then(
                    responce => {
                        console.log(JSON.stringify(responce))
                        window.location = '/login'
                    }
                )
        }
    }
}
</script>

<style scoped>

</style>

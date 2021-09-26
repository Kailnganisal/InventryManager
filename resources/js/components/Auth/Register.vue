<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-2xl text-center font-extrabold text-gray-900">
                    Create Account
                </h2>
            </div>

                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="p-1">
                        <label for="name" class="text-sm text-gray-900">Name</label>
                        <input id="name" v-model="form.name" name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name" />
                    </div>

                    <div class="p-1">
                        <label for="username" class="text-sm text-gray-900">Username</label>
                        <input id="username" v-model="form.username" name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" />
                    </div>

                    <div class="p-1">
                        <label for="email-address" class="text-sm text-gray-900">Email address</label>
                        <input id="email-address" v-model="form.email" name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" />
                    </div>

                    <div class="p-1">
                        <label for="password" class="text-sm text-gray-900">Password</label>
                        <input id="password" v-model="form.password" name="password" type="password" class="mt-0.5 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" />
                    </div>

                    <div class="p-1">
                        <label for="confirmpassword" class="text-sm text-gray-900">Re Enter Password</label>
                        <input id="confirmpassword" v-model="form.password_confirmation" name="password_confirmation" type="password" class="mt-0.5 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Re enter password" />
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <div class="text-sm">
                        <a href="/login" class="font-medium text-gray-700 hover:text-gray-900">
                            Already have an account?, sign in
                        </a>
                    </div>
                </div>

                <div>
                    <button
                        @click="createAccount"
                        type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-black bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Account
                    </button>
                </div>

        </div>
    </div>
</template>

<script>
import Notifications from "../../mixins/Notifications.js";

export default {
    name: "Register",
    mixins: [Notifications],
    data(){
        return{
            form: {
                email: '',
                password: '',
                password_confirmation:'',
                username: '',
                name:'',
            }
        }
    },

    methods:{
        createAccount(){
            this.axios.post('/register',this.form)
            .then(()=>{
                    this.showSuccessMessage("successfully created an account")
                    window.location='/Store'
            }
            )
        }
    }
}
</script>

<style scoped>

</style>

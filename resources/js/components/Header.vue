<template>
    <nav class="flex items-center justify-between bg-gray-900 w-screen">
        <div class="ml-10">
           <router-link to="/">
               <h1 class="text-2xl text-center text-yellow-100 font-black">{{text}}</h1>
           </router-link>

        </div>


        <div class="mr-5 mt-2 mb-2">
            <router-link to="/home">
                <button class="bg-yellow-400 text-center font-bold underline rounded-full p-1 m-0.5">Home</button>
            </router-link>
            <button class="bg-yellow-400 text-center font-bold underline rounded-full p-1 m-0.5">Login</button>
        </div>
    </nav>
</template>


<script>

export default {
    name: "Header",
    props:{
        text:String,
    },
    created() {
        console.log(this.text)
    }
}
</script>

<style scoped>

</style>

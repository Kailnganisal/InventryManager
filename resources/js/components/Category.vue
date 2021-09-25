<template>
    <div class="flex justify-center mt-24">
        <h1 class="text-2xl font-bold text-gray-700">Category Page</h1>
    </div>
    <div class="flex justify-center mt-24">
        <button @click="onSubmit()" class="bg-green-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Test</button>
    </div>

</template>

<script>

export default {
    name: "Category",

    methods:{
        onSubmit(){
            console.log("button clicked")
        }
    }
}
</script>

<style scoped>

</style>

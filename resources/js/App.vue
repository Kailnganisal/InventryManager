<template>
    <LandingPage/>
    <notifications position="top right"/>

<!--    <div id="app">-->
<!--        <button type="button" class="btn" @click="showModal">Open Modal!</button>-->
<!--        <Modal  v-show="isModalVisible" @close="closeModal"/>-->
<!--    </div>-->

</template>

<script>
import LandingPage from "./components/LandingPage";


export default{
    name: 'App',
    components: {LandingPage,},
    data(){
        return{
            isModalVisible: false,
        }
    },
    methods: {

    }
}
</script>


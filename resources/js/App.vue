<template>
    <LandingPage/>
    <notifications position="top right"/>
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


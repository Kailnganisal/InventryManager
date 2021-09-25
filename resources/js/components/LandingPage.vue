<template>
    <div>
        <Header class="sticky top-0 z-50" text="Store"/>
        <router-view class="relative" />
    </div>


</template>

<script>
import Header from "./Header";

export default {
name: "LandingPage",
    components: {Header},
}
</script>

<style scoped>

</style>

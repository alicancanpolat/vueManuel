<template>
    <Layout :username="username" >
        <h1 class="text-3xl">home {{ username }}</h1>
    </Layout>
</template>

<script>

import Layout from "../Shared/Layout.vue";
export default {
    components: {Layout},
    props:{
        username:String,
    }
}


</script>

<style scoped>
</style>

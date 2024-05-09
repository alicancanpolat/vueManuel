<template>
    <Head title="Users"></Head>
    <h1 class="text-3xl">Users</h1>
    <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name"></li>
    </ul>

</template>

<script setup>
defineProps(
    {
        users: Array
    }
);

</script>

<style scoped>
</style>

<template>
    <Head title="Create User" />
    <h1 class="">Create New User</h1>
    <form @submit.prevent="submit1" class="max-w-md mx-auto mt-7">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
            <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">E-Mail</label>
            <input v-model="form.email" type="text" class="border border-gray-400 p-2 w-full" name="email" id="email" required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div>


    </form>
</template>

<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

let form = reactive({
    name: '',
    email: '',
    password: '',
});

let submit1 = () => {
    router.post('/users', form);
}
</script>

<style scoped>

</style>

<template>
    <Head title="Users"></Head>

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl">Users</h1>
        <input v-model='search' type="text" placeholder="Search.." class="border px-2 rounded-lg">
    </div>




    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                <tr v-for="user in users.data" :key="user.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ user.name }}
                    </th>


                    <td class="px-6 py-4 ">
                        <Link :href="'/users/'+ user.id + '/edit'" class="text-indigo-600 hover:text-indigo-900">
                            Edit
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Pagination :links="users.links" class="mt-6"></Pagination>
</template>

<script setup>
import Pagination from "../Shared/Pagination.vue";
import { ref,watch } from "vue";
import { router } from "@inertiajs/vue3";

let props = defineProps(
    {
        users: Object,
        filters: Object
    }
);
let search = ref(props.filters.search);
watch(search, value => {
    router.get("/users", { search: value }, { preserveState: true, preserveScroll: true, replace: true });
})

</script>

<style scoped>
</style>

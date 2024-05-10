<template>
    <Head title="Users"></Head>
    <h1 class="text-3xl">Users</h1>




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

defineProps(
    {
        users: Object
    }
);

</script>

<style scoped>
</style>

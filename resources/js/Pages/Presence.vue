<template>
    <div class="p-5">

        <Link href="/home" class="border-b-2 border-b-blue-400 p-2"><i class="bi bi-arrow-left"></i> Back to Home</Link>

    </div>
    <div class="flex justify-center">
        <div class="w-2/3">
            <h1 class="text-center text-4xl mb-10">{{ subject.name }} Presence</h1>
    
            <form @submit.prevent>
    
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Appointment</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option v-for="n in 16" :value="n" :class="(n==5)? 'text-green-500': ''">{{ n }} {{ (n == 5) ? 'Already Filled!' : '' }}</option>
                </select>
                
                <button class="text-white my-5 ms-auto w-full bg-sky-500 hover:bg-sky-600 p-2 rounded-lg">Submit</button>
            </form>
        </div>

    </div>
</template>

<script>
import Layout from "../Layouts/Layout.vue";
export default {
    layout: Layout,




    props: ['subject']
};
</script>

<script setup>
import { TheCard } from "flowbite-vue";
import { usePage } from "@inertiajs/vue3";

import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
onMounted(() => {
    initFlowbite();
});

const user = usePage().props.auth.user;

</script>

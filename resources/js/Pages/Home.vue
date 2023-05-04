<template>
    <div class="w-full">
        <h1 class="text-4xl text-center my-10">Subjects</h1>
        
        <div class="flex flex-wrap justify-evenly">
            <div v-for="subject in subjects">
                <Link :href="'/presence/' + subject.slug">
                    <the-card class="my-5">
                        <h5
                            class="flex mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                        >
                            {{ subject.name }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Here are the biggest enterprise technology acquisitions of
                            2021 so far, in reverse chronological order.
                        </p>
                    </the-card>
                
                </Link>
            </div>
        </div>
        
    </div>
</template>

<script>
import Layout from "../Layouts/Layout.vue";

export default {
    layout: Layout,

    props: ["subjects"],
};
</script>

<script setup>
import { TheCard } from "flowbite-vue";
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
onMounted(() => {
    initFlowbite();
})
</script>

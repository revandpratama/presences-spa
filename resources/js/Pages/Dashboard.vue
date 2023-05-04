<template>
    <div class="flex justify-between mb-4">
        <h1 class="text-3xl font-medium">Dashboard</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <Link href="/home"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                    </Link>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="ml-1 text-sm font-medium text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dashboard</span>
                    </div>
                </li>

            </ol>
        </nav>
    </div>
    <hr>

    <div class="flex flex-wrap justify-around">
        <span>aaa{{ presenceFilled['0'] }}</span>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5" v-for="subject in subjects">
            <h4 class="text-center text-lg font-semibold">{{ subject.name }}</h4>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Appointment
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                status
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="n in 16">
                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ n }}
                        </th>
                        <td class="px-6 py-4 flex justify-center">
                            <input type="checkbox" :checked="(subject.id == presenceFilled.subject_id) && (n == presenceFilled.appointment)">
                        </td>
                    </tr>
                    
                    <!-- <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import DashboardLayout from '../Layouts/DashboardLayout.vue';

export default {
    layout: DashboardLayout,

    props: ['subjects', 'presenceFilled']

}
</script>

<script setup>
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
onMounted(() => {
    initFlowbite()
})

</script>
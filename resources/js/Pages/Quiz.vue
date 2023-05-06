<template>
    <div class="ms-auto">Timer: {{ displayTime }}</div>
    <span>Quiz page</span>
    <button @click="startTime" class="bg-sky-500 p-2 active:bg-sky-700 hover:bg-sky-600 ">Start</button>
</template>

<script>
import { onMounted } from 'vue';
import DashboardLayout from '../Layouts/DashboardLayout.vue';
import { initFlowbite } from 'flowbite';

export default {
    layout: DashboardLayout,

    data() {
        return {
            time: 10,
            intervalId: null
        }
    },

    methods: {
        startTime() {
            this.intervalId = setInterval(() => {
                this.time--;
                if(this.time == 0){
                    clearInterval(this.intervalId)
                    this.$inertia.visit('/dashboard')
                }
            }, 1000)
        }
    },

    computed: {
        displayTime() {
            const minutes = Math.floor(this.time / 60);
            const seconds = this.time % 60
            return `${minutes}:${seconds.toString().padStart(2, '0')}`
        }
    },

    beforeUnmount() {
        clearInterval(this.intervalId);
    }
}
</script>

<script setup>
onMounted(() => {
    initFlowbite()
})



</script>
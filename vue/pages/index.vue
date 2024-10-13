<template>
    <NuxtLayout>
        <NuxtPage />
        Index Working
        {{ count }}
        <button @click="increment">Increment</button>
    </NuxtLayout>
</template>

<script setup>
import { ref } from "vue";
const count = ref(0);

const increment = () => {
    count.value++;
};
</script>

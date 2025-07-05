<script setup lang="ts">
    import { Input } from '../ui/input';
    import { defineProps } from 'vue';

    defineProps<{
        name: string;
    }>();
</script>

<template>
    <Input :name="name" type="email" placeholder="Enter your email" />
</template>

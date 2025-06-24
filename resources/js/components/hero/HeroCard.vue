<script setup lang="ts">
    import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
    CardTitle,
    } from '@/components/ui/card';
</script>
<template>
    <Card class="bg-transparent min-w-[200px] md:min-w-[250px] max-w-[200px] md:max-w-[300px] shadow-md shadow-emerald-500 hover:shadow-lg transition-shadow duration-300">
        <CardHeader>
            <CardTitle class="text-xl"><slot name="title"></slot></CardTitle>
        </CardHeader>
        <CardContent>
            <slot name="content"></slot>
        </CardContent>
        <CardFooter>
            <slot name="footer"></slot>
        </CardFooter>
    </Card>
</template>
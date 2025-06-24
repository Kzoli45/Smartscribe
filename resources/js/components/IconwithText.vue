<script setup lang="ts">

</script>

<template>
    <div class="flex items-center gap-1 p-2 rounded-md w-fit dark:text-white cursor-pointer hover:bg-gray-100 dark:hover:bg-stone-800 transition-colors">
        <slot name="icon"></slot>
        <slot name="text"></slot>
    </div>
</template>
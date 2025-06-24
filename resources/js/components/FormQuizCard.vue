<script setup lang="ts">
    
</script>

<template>
    <div class="flex flex-col rounded-md bg-accent gap-16 justify-between p-4 shadow-md shadow-black/20 hover:shadow-lg transition-all cursor-pointer max-w-[2500px] h-full">
        <div class="flex flex-col gap-1 items-start">
            <h1 class="text-lg font-semibold"><slot name="title"></slot></h1>
            <span class="text-sm italic">Created by <slot name="creator"></slot></span>
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex flex-wrap max-w-full gap-2">
                <slot name="tags"></slot>
            </div>
            <div class="flex items-center justify-between gap-4">
                <span class="text-xs"><slot name="questions"></slot> questions</span>
                <slot name="lock"></slot>
                <span class="text-xs"><slot name="responses"></slot> responses</span>
            </div>
        </div>
    </div>
</template>

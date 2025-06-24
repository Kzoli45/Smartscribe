<script setup lang="ts">
    import { ref, onMounted, defineComponent } from 'vue';
    import { Moon, Sun, AlarmClock } from 'lucide-vue-next';

    const message = ref('');
    const icon = ref<typeof defineComponent | null>(null);
    const getTime = () => {
        const now = new Date();
        const hours = now.getHours();
        if (hours < 12) {
            message.value = 'Good morning';
            icon.value = AlarmClock;
        } else if (hours < 18) {
            message.value = 'Good afternoon';
            icon.value = Sun;
        } else {
            message.value = 'Good evening';
            icon.value = Moon;
        }
    };

    onMounted(() => {
        getTime();
    });
</script>

<template>
    <div class="flex items-center justify-center gap-1">
        <component :is="icon" class="w-4 h-4 text-emerald-500 dark:text-emerald-700" v-if="icon" />
        <span class="text-sm">{{ message }}</span>
    </div>
</template>
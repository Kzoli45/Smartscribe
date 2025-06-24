<script setup lang="ts">
    import DesktopNavbar from '@/components/navbar/DesktopNavbar.vue';
    import ResponsiveNavbar from '@/components/navbar/ResponsiveNavbar.vue';
</script>

<template>
    <header class="not-has-[nav]:hidden mb-6 w-full text-sm">
        <DesktopNavbar class="hidden lg:flex" />
        <ResponsiveNavbar class="lg:hidden" />
    </header>
</template>

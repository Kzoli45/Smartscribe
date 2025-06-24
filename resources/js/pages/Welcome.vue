<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/navbar/NavBar.vue';
import HeroSection from '@/components/hero/HeroSection.vue';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
        <Navbar />
        <div class="duration-750 starting:opacity-0 flex w-full items-center justify-center opacity-100 transition-opacity lg:grow">
            <main class="flex w-full  flex-col-reverse overflow-hidden rounded-lg  lg:flex-row">
                <div
                    class="flex-1 rounded-bl-lg rounded-br-lg pb-12 text-[13px] leading-[20px] dark:text-[#EDEDEC] lg:rounded-br-none lg:rounded-tl-lg"
                >
                <HeroSection />
                </div>
            </main>
        </div>
    </div>
</template>

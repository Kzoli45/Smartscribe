<script setup lang="ts">
    import {Button} from '@/components/ui/button';
    import HeroCard from './HeroCard.vue';
    import { ClipboardType, FileQuestion, ChartNoAxesCombined } from 'lucide-vue-next';
    import RandomQuestion from './RandomQuestion.vue';
</script>

<template>
    <section class="flex flex-col items-center justify-center dark:from-[#0a0a0a] dark:to-[#1b1b18] bg-[linear-gradient(to_bottom,_#FDFDFC,_#EDEDEC,_#FDFDFC)] dark:bg-[linear-gradient(to_bottom,_#0a0a0a,_#1b1b18,_#0a0a0a)] rounded-lg">
        <div class="flex flex-col lg:flex-row mb-8">
            <div class="flex flex-col items-start justify-center p-6 mb-5 lg:p-8">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white tracking-wider">Welcome to <span class="text-emerald-700">smartScribe</span></h1>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">Build and take forms and quizzes of any kind of complexity with ease</p>
                <div class="flex flex-row gap-2 mt-4">
                    <a href="#"><Button class="mt-4 bg-emerald-500 hover:bg-emerald-400 dark:hover:bg-emerald-700 cursor-pointer text-gray-300">Start Creating</Button></a>
                    <a href="#"><Button class="mt-4 cursor-pointer">Check out the collection</Button></a>
                </div>
            </div>
            <div class="max-w-lg p-6 lg:p-8">
                <img src="/images/hero-image.svg" alt="hero image">
            </div>
        </div>
        <h1 class="text-4xl text-center font-bold text-gray-900 dark:text-white tracking-wider mt-6">Achieve all your form goals with <span class="text-emerald-700">smartScribe</span></h1>
        <div class="flex flex-row justify-center p-6 mt-6 flex-wrap gap-4 lg:gap-8 items-stretch">
            <HeroCard>
                <template #title>
                    <div class="flex flex-row gap-2">
                        <ClipboardType class="h-6 w-6 text-emerald-500" />
                        <span class="font-semibold">Forms</span>
                    </div>
                </template>
                <template #content>
                    <div class="text-gray-700 dark:text-gray-300">
                        Create and fill out your forms with ease using smartScribe's intuitive interface.
                    </div>
                </template>
                <template #footer>
                    <a href="#"><Button class="mt-4 bg-emerald-500  hover:bg-emerald-400 dark:hover:bg-emerald-700 cursor-pointer text-gray-300">Take me there</Button></a>
                </template>
            </HeroCard>
            <HeroCard>
                <template #title>
                    <div class="flex flex-row gap-2">
                        <FileQuestion class="h-6 w-6 text-emerald-500" />
                        <span class="font-semibold">Quizzes</span>
                    </div>
                </template>
                <template #content>
                    <div class="text-gray-700 dark:text-gray-300">
                        Create and partake in engaging trivia with ease using smartScribe's interface.
                    </div>
                </template>
                <template #footer>
                    <a href="#"><Button class="mt-4 bg-emerald-500  hover:bg-emerald-400 dark:hover:bg-emerald-700 cursor-pointer text-gray-300">Take me there</Button></a>
                </template>
            </HeroCard>
            <HeroCard>
                <template #title>
                    <div class="flex flex-row gap-2">
                        <ChartNoAxesCombined class="h-6 w-6 text-emerald-500" />
                        <span class="font-semibold">Statistics</span>
                    </div>
                </template>
                <template #content>
                    <div class="text-gray-700 dark:text-gray-300">
                        Keep track of your projects on your personal dashboard.
                    </div>
                </template>
                <template #footer>
                    <a href="#"><Button class="mt-4 bg-emerald-500  hover:bg-emerald-400 dark:hover:bg-emerald-700 cursor-pointer text-gray-300">Take me there</Button></a>
                </template>
            </HeroCard>
        </div>
        <h1 class="text-4xl text-center font-bold text-gray-900 dark:text-white tracking-wider mt-6">Test your knowledge with some random trivia</h1>
        <div class="flex flex-col items-center justify-center p-6 mt-6">
            <RandomQuestion />
        </div>
    </section>
</template>

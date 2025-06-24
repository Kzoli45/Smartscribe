<script setup lang="ts">
import { ref, onMounted } from 'vue';
import getQuestion from '@/composables/questions';
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
} from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'

//rewrite to ts

const question = ref<{ question: string; answer: string }>({ question: '', answer: '' });
const loading = ref(true);
const answer = ref('');
const feedback = ref('');
const disabled = ref(false);

const fetchQuestion = async () => {
    loading.value = true;
    feedback.value = '';
    question.value = await getQuestion();
    loading.value = false;
}

onMounted(() => {
    fetchQuestion();
});

const checkAnswer = () => {
    if (answer.value.trim().toLowerCase() === question.value.answer.trim().toLowerCase()) {
        feedback.value = 'correct';
    } else {
        feedback.value = 'incorrect';
    }
    disabled.value = true;
}

const reset = () => {
    disabled.value = false;
    answer.value = '';
    fetchQuestion();
}

</script>

<template>
    <Card class="w-full min-w-[200px] lg:min-w-[950px] bg-transparent shadow-md shadow-emerald-500 hover:shadow-lg transition-shadow duration-300">
    <CardHeader>
      <CardDescription>
        <div>
            <p>{{ loading ? 'Getting a question for you...' : question.question }}</p>
        </div>
      </CardDescription>
    </CardHeader>
    <CardContent class="flex flex-row">
        <div class="flex flex-col w-[90%]">
            <Input @keyup.enter="checkAnswer" placeholder="Answer" v-model="answer" :class="{
                'border-green-500 border-4': feedback === 'correct',
                'border-red-500 border-4': feedback === 'incorrect',
            }" class="transition ease-in"
            :disabled="disabled"
            />
            <div class="mt-2 text-gray-600 ease-linear">
                <p v-if="feedback === 'incorrect'">Answer was {{ question.answer }}</p>
            </div>
        </div>
        <div class="flex justify-center ease-linear">
            <div class="ml-6 text-2xl">
                <div v-if="feedback === 'correct'">✔</div>
                <div v-if="feedback === 'incorrect'">❌</div>
            </div>
        </div>
    </CardContent>
    <CardFooter class="flex gap-4">
        <Button @click="checkAnswer" class="mt-4 bg-emerald-500  hover:bg-emerald-400 dark:hover:bg-emerald-700 cursor-pointer text-gray-300">Submit Answer</Button>
        <Button @click="reset" class="mt-4 cursor-pointer">Other Question</Button>
    </CardFooter>
  </Card>
</template>

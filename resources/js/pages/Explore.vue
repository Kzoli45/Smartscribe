<script setup lang="ts">
    import Sidebar from '@/components/Sidebar.vue';
    import InputError from '@/components/InputError.vue';
    import FormQuizCard from '@/components/FormQuizCard.vue';
    import { Lock } from 'lucide-vue-next';
    import { Link, useForm } from '@inertiajs/vue3';
    import { Button } from '@/components/ui/button'
    import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
    } from '@/components/ui/dialog'
    import { Input } from '@/components/ui/input'
    import { Label } from '@/components/ui/label'

    defineProps({
        forms: {
            type: Object as () => Record<string, any>,
            default: () => ({})
        }
    });

    const passwordForm = useForm({
        password: ''
    });


</script>

<template>
    <Sidebar>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <template v-for="form in forms" :key="form.id">
                    <template v-if="form.is_public">
                        <Link :href="route('explore.form.show', form.id)" class="no-underline">
                            <FormQuizCard>
                                <template #title>{{ form.title }}</template>
                                <template #creator>{{ form.creator.name }}</template>
                                <template #tags>
                                    <span v-for="tag in JSON.parse(form.tags)" :key="tag" class="rounded-md bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">{{ tag }}</span>
                                    </template>
                                    <template #questions>{{ form.field_count }}</template>
                                    <template #lock><Lock v-if="!form.is_public" class='size-4'/></template>
                                    <template #responses>{{ form.submission_count }}</template>
                            </FormQuizCard>
                        </Link>
                    </template>
                    <template v-else>
                        <Dialog>
                            <DialogTrigger as-child>
                                <FormQuizCard>
                                    <template #title>{{ form.title }}</template>
                                    <template #creator>{{ form.creator.name }}</template>
                                    <template #tags>
                                        <span v-for="tag in JSON.parse(form.tags)" :key="tag" class="rounded-md bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">{{ tag }}</span>
                                    </template>
                                    <template #questions>{{ form.field_count }}</template>
                                    <template #lock><Lock class='size-4'/></template>
                                    <template #responses>{{ form.submission_count }}</template>
                                </FormQuizCard>
                            </DialogTrigger>
                                <DialogContent class="sm:max-w-[425px]">
                            <form @submit.prevent="passwordForm.post(route('explore.form.check', form.id)), {
                                    onFinish: () => passwordForm.reset('password')}">
                                <DialogHeader>
                                    <DialogTitle class="mb-2">Enter Password</DialogTitle>
                                    <DialogDescription class="mb-4">
                                        To access this form, please enter the password.
                                    </DialogDescription>
                                </DialogHeader>
                                <div class="grid gap-4 py-4">
                                    <div class="grid grid-cols-4 items-center gap-4">
                                    <Label for="password" class="text-right">
                                        Password
                                    </Label>
                                    <Input id="password" type="password" class="col-span-3" required v-model="passwordForm.password"/>
                                    </div>
                                </div>
                                <InputError :message="passwordForm.errors.password" />
                                <DialogFooter>
                                    <Button type="submit" :disabled="passwordForm.processing">
                                        Submit
                                    </Button>
                                </DialogFooter>
                                </form>
                                </DialogContent>
                        </Dialog>
                    </template>
                </template>
            </div>
        </div>
    </Sidebar>
</template>

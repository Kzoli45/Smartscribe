<script setup lang="ts">
    import { defineProps } from 'vue';
    import Sidebar from '@/components/Sidebar.vue';
    import FormField from '@/components/FormField.vue';
    import { useForm } from '@inertiajs/vue3';
    import Button from '@/components/ui/button/Button.vue';

    const props = defineProps({
        form: {
            type: Object as () => Record<string, any>,
            required: true
        },
        creator: {
            type: Object as () => Record<string, any>,
            required: true
        },
        fields: {
            type: Array as () => Array<Record<string, any>>,
            required: true
        },
    });

    const initialData = Object.fromEntries(props.fields.map(f => [f.field_name, '']));

    const submitForm = useForm({
        form_id: props.form.id,
        content: initialData,
    });
</script>

<template>
    <Sidebar>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min p-4">
            <div class="flex flex-col gap-4">
                <h1 class="text-2xl font-bold capitalize">{{ form.title }}</h1>
                <p class="mt-2 italic">{{ form.description }}</p>
                <form @submit.prevent="submitForm.post(route('explore.submission.store'))" class="flex flex-col gap-4">
                    <div class="flex flex-col gap-4 mt-4">
                        <div v-for="field in fields" :key="field.id">
                            <div class="flex  gap-2 mb-2 text-sm text-gray-700 dark:text-gray-300 font-bold">
                                <div>{{ field.field_description }}</div>
                                <span v-if="field.is_required" class="text-red-500">*</span>
                            </div>
                            <FormField
                                v-model="submitForm.content[field.field_name]"
                                :variant="field.field_type"
                                :name="field.field_name"
                                :required="field.is_required"
                                :items="JSON.parse(field.field_options)"
                            />
                        </div>
                    </div>
                    <div class="flex justify-start mt-4">
                        <Button type="submit" :disabled="submitForm.processing" class="cursor-pointer">
                            Submit
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </Sidebar>
</template>
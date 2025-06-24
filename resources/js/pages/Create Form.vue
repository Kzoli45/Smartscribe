<script setup lang="ts">
    import Sidebar from '@/components/Sidebar.vue';
    import { createNewForm, createNewField, validateForm } from '@/composables/createNewForm';
    import { Eye } from 'lucide-vue-next';
    import draggable from 'vuedraggable'
    import { ref, watch, onMounted } from 'vue';
    import axios from 'axios';
    import { Input } from '@/components/ui/input';
    import { Checkbox } from '@/components/ui/checkbox';
    import { TagsInput, TagsInputInput, TagsInputItem, TagsInputItemDelete, TagsInputItemText } from '@/components/ui/tags-input'
    import {Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle, DialogTrigger, DialogClose} from '@/components/ui/dialog'
    import { Move, Pencil, Plus, Trash } from 'lucide-vue-next';
    import { Button } from '@/components/ui/button';
    import {Select, SelectContent, SelectGroup,SelectItem,SelectTrigger,SelectValue} from '@/components/ui/select';
    import { useToast } from '@/composables/toast';

    const form = ref(createNewForm());
    const showPassword = ref(false);

    const togglePasswordVisibility = () => {
        showPassword.value = !showPassword.value;
    };

    watch(form, (newForm) => {
        localStorage.setItem('form', JSON.stringify(newForm));
    }, { deep: true });

    onMounted(() => {
        const savedForm = localStorage.getItem('form');
        if (savedForm) {
            form.value = JSON.parse(savedForm);
        }
    });

    const handleSubmit = () => {
        const errors = validateForm(form.value);
        if (errors.length > 0) {
            useToast('error', 'Error!', errors[0]);
            return;
        }
        axios.post('/create/form', form.value, {
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(() => {
                useToast('success', 'Form Saved', 'Your form has been saved successfully.');
                form.value = createNewForm();
            })
            .catch((error: any) => {
                useToast('error', 'Error!', 'An error occurred while saving the form.');
                console.error(error);
            });
    };

</script>

<template>
    <Sidebar>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min p-4">
            <div class="flex flex-col gap-6 p-4 rounded-md form-container">
                <div class="flex flex-row flex-wrap items-stretch justify-between">
                    <div class="flex gap-4">
                        <div class="flex flex-col gap-2">
                            <h1 class="mb-2">Form Title</h1>
                            <Input v-model="form.title" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h1 class="mb-2">Form Color</h1>
                            <Input type="color" v-model="form.color" class="w-24" />
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex flex-col gap-2 min-w-32">
                            <h1 class="mb-2">Reset Form</h1>
                            <Button @click="form = createNewForm(); useToast('default', 'Form Reset', 'The form has been reset.');" class="bg-transparent border-black dark:border-white border-1 text-black dark:text-white hover:bg-accent cursor-pointer">Reset</Button>
                        </div>
                        <div class="flex flex-col gap-2 min-w-32">
                            <h1 class="mb-2">Save Form</h1>
                            <Button @click="handleSubmit" class="cursor-pointer">Save</Button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <h1>Form Description</h1>
                    <Input v-model="form.description" class="h-24" />
                </div>
                <div class="flex gap-2 flex-row items-center flex-wrap">
                    <div class="flex flex-col justify-center gap-2 min-w-sm">
                        <h1>Password</h1>
                            <div class="flex items-center gap-4 h-10">
                                <Checkbox v-model="form.isPublic" />
                                <div class="flex items-center gap-2">
                                    <Input v-if="form.isPublic" :type="showPassword ? 'text' : 'password'" v-model="form.password" class="w-48" placeholder="Password" />
                                    <Eye v-if="form.isPublic" class="cursor-pointer" @click="togglePasswordVisibility" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center gap-2 min-w-sm">
                            <h1>Tags</h1>
                            <div class="flex items-center gap-4 h-10">
                                <Checkbox v-model="form.hasTags" />
                                <div class="flex items-center gap-2">
                                    <TagsInput v-model="form.tags" v-if="form.hasTags">
                                        <TagsInputItem v-for="item in form.tags" :key="item" :value="item">
                                            <TagsInputItemText />
                                            <TagsInputItemDelete />
                                        </TagsInputItem>
                                        <TagsInputInput placeholder="Tags..." />
                                    </TagsInput>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-2 mb-4">
                        <h1>Fields</h1>
                        <Plus class="cursor-pointer size-6" @click="form.fields.push(createNewField(form.fields.length + 1))" />
                    </div>
                    <draggable v-model="form.fields" item-key="id" handle=".drag-handle" class="flex flex-col gap-2" :animation="200" :group="{ name: 'fields', pull: true, put: true }">
                        <template #item="{ element: field, index }">
                            <div class="flex bg-accent p-4 rounded-md justify-between items-center">
                                <Move class="cursor-pointer drag-handle" />
                                <span>{{ field.fieldName }}</span>
                                <div class="flex gap-4">
                                    <Dialog>
                                        <DialogTrigger>
                                            <Pencil class="cursor-pointer" />
                                        </DialogTrigger>
                                        <DialogContent>
                                        <DialogHeader>
                                            <DialogTitle class="mb-4">Edit Field</DialogTitle>
                                            <DialogDescription>
                                                <div class="flex flex-col gap-4">
                                                    <div class="flex flex-col gap-1">
                                                        <h1 class="mb-2">Field Name</h1>
                                                        <Input v-model="field.fieldName" />
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        <h1 class="mb-2">Field Description</h1>
                                                        <Input v-model="field.fieldDescription" class="h-20" />
                                                    </div>
                                                    <div class="flex items-center gap-2 mt-2">
                                                        <h1 class="mb-2">Is this field required?</h1>
                                                        <Checkbox class="mb-2" v-model="field.isRequired" />
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        <h1 class="mb-2">Field Type</h1>
                                                        <Select v-model="field.fieldType">
                                                            <SelectTrigger class="w-48">
                                                                <SelectValue />
                                                            </SelectTrigger>
                                                            <SelectContent>
                                                                <SelectGroup>
                                                                    <SelectItem value="text">Text</SelectItem>
                                                                    <SelectItem value="email">Email</SelectItem>
                                                                    <SelectItem value="number">Number</SelectItem>
                                                                    <SelectItem value="date">Date</SelectItem>
                                                                    <SelectItem value="select">Select</SelectItem>
                                                                    <SelectItem value="multiselect">Multiple Select</SelectItem>
                                                                    <SelectItem value="phone">Phone</SelectItem>
                                                                    <SelectItem value="checkbox">Checkbox</SelectItem>
                                                                    <SelectItem value="image">Image</SelectItem>
                                                                </SelectGroup>
                                                            </SelectContent>
                                                        </Select>
                                                    </div>
                                                    <div class="flex flex-col gap-1" v-if="field.fieldType === 'select' || field.fieldType === 'multiselect'">
                                                        <h1 class="mb-2">Options</h1>
                                                        <TagsInput v-model="field.options">
                                                            <TagsInputItem v-for="option in field.options" :key="option" :value="option">
                                                                <TagsInputItemText />
                                                                <TagsInputItemDelete />
                                                            </TagsInputItem>
                                                            <TagsInputInput placeholder="Add option..." />
                                                        </TagsInput>
                                                    </div>
                                                </div>
                                            </DialogDescription>
                                        </DialogHeader>
                                        <DialogFooter>
                                            <DialogClose class="mt-4">
                                                <Button type="submit" class="cursor-pointer">Save</Button>
                                            </DialogClose>
                                        </DialogFooter>
                                    </DialogContent>
                                    </Dialog>
                                    <Trash class="cursor-pointer" @click="form.fields.splice(index, 1)" />
                                </div>
                            </div>
                        </template>
                    </draggable>
                </div>
            </div>
        </div>
    </Sidebar>
</template>

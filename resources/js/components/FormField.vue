<script setup lang="ts">
    
    import Text from './formfields/Text.vue';
    import Email from './formfields/Email.vue';
    import Number from './formfields/Number.vue';
    import Date from './formfields/Date.vue';
    import Phone from './formfields/Phone.vue';
    import Checkbox from './formfields/Checkbox.vue';
    import Image from './formfields/Image.vue';
    import Select from './formfields/Select.vue';
    import MultiSelect from './formfields/MultiSelect.vue';
    import { defineProps } from 'vue';

    const variants = {
        text: Text,
        email: Email,
        number: Number,
        date: Date,
        phone: Phone,
        checkbox: Checkbox,
        image: Image,
        select: Select,
        multiselect: MultiSelect
    };

    const props = defineProps<{
        variant: keyof typeof variants;
        name: string;
        required?: boolean;
    }>();
    
</script>

<template>
    <component
        :is="variants[props.variant]"
        :name="props.name"
        :required="props.required"
    />
</template>

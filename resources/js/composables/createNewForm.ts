export const createNewForm = () => {
    const form = {
        title: 'New Form',
        description: 'Form description',
        color: 'accent',
        password: '',
        hasTags: false,
        tags: [],
        isPublic: false,
        fields: [createNewField(1)],
        getFieldCount() {
            return this.fields.length;
        }
    }

    return form;
};

export const createNewField = (id: number) => {
    return {
        id: id,
        fieldType: 'text',
        fieldName: 'New Field',
        fieldDescription: 'Field description',
        isRequired: false,
        options: [],
        file: null,
    };
}

export const createNameField = (id: number) => {
    return {
        id: id,
        fieldType: 'text',
        fieldName: 'Name',
        fieldDescription: 'Enter your name',
        isRequired: true,
        options: [],
        file: null,
    };
}

export const createEmailField = (id: number) => {
    return {
        id: id,
        fieldType: 'email',
        fieldName: 'Email',
        fieldDescription: 'Enter your email',
        isRequired: true,
        options: [],
        file: null,
    };
}

export const validateForm = (form: any) => {
    const errors: string[] = [];

    if (!form.title || form.title.trim() === '') {
        errors.push('Form title is required.');
    }

    if (form.fields.length === 0) {
        errors.push('The form must have at least one field.');
    } else {
        form.fields.forEach((field: any, index: number) => {
            if (!field.fieldName || field.fieldName.trim() === '') {
                errors.push(`Field name is required for field ${index + 1}.`);
            }
        });
    }

    return errors;
}

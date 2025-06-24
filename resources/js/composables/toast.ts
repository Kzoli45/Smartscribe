import { createVNode, render } from 'vue';
import Toast from '../components/Toast.vue';

export const useToast = (variant: string, title: string, message: string) => {
    const vnode = createVNode(Toast, {
        variant,
        title,
        message,
    });

    const container = document.createElement('div');
    document.body.appendChild(container);
    render(vnode, container);

    setTimeout(() => {
        render(null, container);
        document.body.removeChild(container);
    }, 2000);
};

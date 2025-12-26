import { defineStore } from 'pinia';
import { ref } from 'vue';

export interface ToastNotification {
    id: string;
    message: string;
    type: 'success' | 'error' | 'info' | 'warning';
}

export const useUiStore = defineStore('ui', () => {
    // Sidebar State
    const isSidebarOpen = ref(true);
    
    function toggleSidebar() {
        isSidebarOpen.value = !isSidebarOpen.value;
    }

    function setSidebarState(state: boolean) {
        isSidebarOpen.value = state;
    }

    // Dark Mode State (can integrate with useAppearance if needed, keeping simple for now)
    const isDarkMode = ref(false);

    function toggleDarkMode() {
        isDarkMode.value = !isDarkMode.value;
        if (isDarkMode.value) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    // Toast Notifications
    const notifications = ref<ToastNotification[]>([]);

    function addToast(message: string, type: ToastNotification['type'] = 'info') {
        const id = Date.now().toString();
        notifications.value.push({ id, message, type });

        // Auto remove after 3 seconds
        setTimeout(() => {
            removeToast(id);
        }, 3000);
    }

    function removeToast(id: string) {
        notifications.value = notifications.value.filter(n => n.id !== id);
    }

    return {
        isSidebarOpen,
        toggleSidebar,
        setSidebarState,
        isDarkMode,
        toggleDarkMode,
        notifications,
        addToast,
        removeToast
    };
});

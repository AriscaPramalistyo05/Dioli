<!-- Toast Notifications Container -->
<div x-data="toastNotification()" 
     x-on:toast.window="addToast($event.detail)"
     class="fixed top-4 right-4 z-50 space-y-3">
    
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.visible"
             x-transition:enter="transform ease-out duration-300 transition"
             x-transition:enter-start="translate-x-full opacity-0"
             x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             :class="{
                 'bg-green-500': toast.type === 'success',
                 'bg-red-500': toast.type === 'error',
                 'bg-yellow-500': toast.type === 'warning',
                 'bg-blue-500': toast.type === 'info'
             }"
             class="flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg text-white min-w-[300px] max-w-md">
            
            <!-- Icon -->
            <div class="flex-shrink-0">
                <!-- Success Icon -->
                <template x-if="toast.type === 'success'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </template>
                <!-- Error Icon -->
                <template x-if="toast.type === 'error'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </template>
                <!-- Warning Icon -->
                <template x-if="toast.type === 'warning'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </template>
                <!-- Info Icon -->
                <template x-if="toast.type === 'info'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </template>
            </div>
            
            <!-- Message -->
            <p class="flex-1 text-sm font-medium" x-text="toast.message"></p>
            
            <!-- Close Button -->
            <button @click="removeToast(toast.id)" class="flex-shrink-0 hover:opacity-75">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </template>
</div>

<!-- Toast from Laravel Session -->
@if(session('success'))
<script>
    document.addEventListener('alpine:init', () => {
        setTimeout(() => {
            window.dispatchEvent(new CustomEvent('toast', {
                detail: { type: 'success', message: '{{ session('success') }}' }
            }));
        }, 100);
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('alpine:init', () => {
        setTimeout(() => {
            window.dispatchEvent(new CustomEvent('toast', {
                detail: { type: 'error', message: '{{ session('error') }}' }
            }));
        }, 100);
    });
</script>
@endif

<script>
    function toastNotification() {
        return {
            toasts: [],
            addToast(detail) {
                const id = Date.now();
                this.toasts.push({
                    id: id,
                    type: detail.type || 'info',
                    message: detail.message,
                    visible: true
                });
                
                // Auto remove after 3 seconds
                setTimeout(() => {
                    this.removeToast(id);
                }, 3000);
            },
            removeToast(id) {
                const index = this.toasts.findIndex(t => t.id === id);
                if (index > -1) {
                    this.toasts[index].visible = false;
                    setTimeout(() => {
                        this.toasts = this.toasts.filter(t => t.id !== id);
                    }, 200);
                }
            }
        }
    }
</script>

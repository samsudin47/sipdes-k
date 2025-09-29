<template>
    <div class="flex items-center">
        <img
            src="/logo-blora.png"
            alt="Logo Kabupaten Blora"
            class="h-8 w-8 object-contain"
            @error="handleImageError"
        />
        <!-- Fallback jika gambar tidak ada -->
        <div
            v-show="imageError"
            class="h-8 w-8 bg-gray-200 rounded flex items-center justify-center"
        >
            <svg
                class="h-5 w-5 text-gray-500"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                />
            </svg>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const imageError = ref(false);

const handleImageError = () => {
    imageError.value = true;
};
</script>

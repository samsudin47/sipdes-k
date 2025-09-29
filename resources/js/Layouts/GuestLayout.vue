<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { ref } from "vue";

// Jika Anda meletakkan gambar di resources/assets/images/
// import logoBlora from '@/assets/images/logo-blora.png';

const imageError = ref(false);

const handleImageError = () => {
    imageError.value = true;
};
</script>

<template>
    <div class="flex min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <!-- Area Header untuk judul -->
        <div class="absolute top-0 left-0 right-0 z-10 pt-6 pb-4">
            <div class="text-center">
                <h1
                    class="text-3xl font-bold text-blue-800 mt-5"
                    style="
                        font-family: 'Figtree', 'Nunito', ui-sans-serif,
                            system-ui, sans-serif;
                    "
                >
                    REKAPITULASI PENDUDUK DESA
                </h1>
            </div>
        </div>

        <!-- Container utama dengan flex -->
        <div class="flex flex-1 items-center justify-center pt-32 pb-6 px-6">
            <div class="flex w-full max-w-6xl items-center gap-12">
                <!-- Area gambar di sebelah kiri -->
                <div class="hidden lg:flex flex-1 items-center justify-center">
                    <div class="text-center">
                        <!-- Logo Blora -->
                        <img
                            src="/logo-blora.png"
                            alt="Logo Kabupaten Blora"
                            class="w-64 h-64 object-contain mx-auto mb-4 drop-shadow-lg"
                            @error="handleImageError"
                        />
                        <!-- Fallback jika gambar tidak ada -->
                        <div
                            v-show="imageError"
                            class="w-64 h-64 bg-gray-200 rounded-lg flex items-center justify-center mx-auto mb-4"
                        >
                            <div class="text-center text-gray-500">
                                <svg
                                    class="w-16 h-16 mx-auto mb-2"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"
                                    />
                                </svg>
                                <p class="text-sm">Logo Pemerintah</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-lg font-bold text-gray-800">
                                PEMERINTAH KABUPATEN BLORA
                            </p>
                            <p class="text-sm text-gray-600">
                                Jawa Tengah - Indonesia
                            </p>
                            <p class="text-xs text-gray-500 italic">
                                "Bersama Membangun Daerah"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Area form di sebelah kanan -->
                <div class="flex-1 max-w-md">
                    <div
                        class="bg-white px-8 py-6 shadow-lg border border-gray-200 rounded-lg"
                    >
                        <slot />
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-xs text-gray-500">
                            © 2025 Pemerintah Desa Krocok, Kabupaten Blora
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    statistics: Object,
});

// Helper function untuk format angka
const formatNumber = (num) => {
    return new Intl.NumberFormat("id-ID").format(num || 0);
};

// Helper function untuk perhitungan persentase
const getPercentage = (value, total) => {
    if (!total || total === 0) return 0;
    return ((value / total) * 100).toFixed(1);
};
</script>

<template>
    <Head title="Dashboard SIPDES-K" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    SIPDES-K
                </h2>
                <Link
                    :href="route('penduduk.index')"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Lihat Data Penduduk
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
                <!-- Statistik Utama -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                    <!-- Total Penduduk -->
                    <div
                        class="bg-gradient-to-r from-blue-500 to-blue-600 overflow-hidden shadow-lg rounded-lg"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-blue-100 truncate"
                                        >
                                            Total Penduduk
                                        </dt>
                                        <dd
                                            class="text-3xl font-bold text-white"
                                        >
                                            {{
                                                formatNumber(
                                                    statistics.total_penduduk
                                                )
                                            }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total KK -->
                    <div
                        class="bg-gradient-to-r from-orange-500 to-orange-600 overflow-hidden shadow-lg rounded-lg"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2m-6 4h6"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-orange-100 truncate"
                                        >
                                            Total KK
                                        </dt>
                                        <dd
                                            class="text-3xl font-bold text-white"
                                        >
                                            {{
                                                formatNumber(
                                                    statistics.total_kk
                                                )
                                            }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Laki-laki -->
                    <div
                        class="bg-gradient-to-r from-indigo-500 to-indigo-600 overflow-hidden shadow-lg rounded-lg"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-indigo-100 truncate"
                                        >
                                            Laki-laki
                                        </dt>
                                        <dd
                                            class="text-3xl font-bold text-white"
                                        >
                                            {{
                                                formatNumber(
                                                    statistics.total_pria
                                                )
                                            }}
                                        </dd>
                                        <dd class="text-sm text-indigo-100">
                                            {{
                                                getPercentage(
                                                    statistics.total_pria,
                                                    statistics.total_penduduk
                                                )
                                            }}%
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Perempuan -->
                    <div
                        class="bg-gradient-to-r from-purple-500 to-purple-600 overflow-hidden shadow-lg rounded-lg"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-8 w-8 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt
                                            class="text-sm font-medium text-purple-100 truncate"
                                        >
                                            Perempuan
                                        </dt>
                                        <dd
                                            class="text-3xl font-bold text-white"
                                        >
                                            {{
                                                formatNumber(
                                                    statistics.total_wanita
                                                )
                                            }}
                                        </dd>
                                        <dd class="text-sm text-purple-100">
                                            {{
                                                getPercentage(
                                                    statistics.total_wanita,
                                                    statistics.total_penduduk
                                                )
                                            }}%
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistik Kelompok Usia -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">
                            Distribusi Kelompok Usia
                        </h3>
                    </div>
                    <div class="p-6">
                        <div
                            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4"
                        >
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">
                                    {{ formatNumber(statistics.usia_0_5) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    0-5 Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_0_5,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-green-600">
                                    {{ formatNumber(statistics.usia_6_12) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    6-12 Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_6_12,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-yellow-600">
                                    {{ formatNumber(statistics.usia_13_18) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    13-18 Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_13_18,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-600">
                                    {{ formatNumber(statistics.usia_19_35) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    19-35 Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_19_35,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600">
                                    {{ formatNumber(statistics.usia_36_60) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    36-60 Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_36_60,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-red-600">
                                    {{ formatNumber(statistics.usia_60_plus) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    60+ Tahun
                                </div>
                                <div class="text-xs text-gray-400">
                                    {{
                                        getPercentage(
                                            statistics.usia_60_plus,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row untuk Statistik Lainnya -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Statistik Pendidikan -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Tingkat Pendidikan
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div
                                    v-for="(
                                        count, pendidikan
                                    ) in statistics.pendidikan_stats"
                                    :key="pendidikan"
                                    class="flex justify-between items-center"
                                >
                                    <span class="text-sm text-gray-600">{{
                                        pendidikan || "Tidak Diisi"
                                    }}</span>
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-gray-900 mr-2"
                                            >{{ formatNumber(count) }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    count,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Agama -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Agama
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div
                                    v-for="(
                                        count, agama
                                    ) in statistics.agama_stats"
                                    :key="agama"
                                    class="flex justify-between items-center"
                                >
                                    <span class="text-sm text-gray-600">{{
                                        agama
                                    }}</span>
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-gray-900 mr-2"
                                            >{{ formatNumber(count) }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    count,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Status Perkawinan -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Status Perkawinan
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-3">
                                <div
                                    v-for="(
                                        count, status
                                    ) in statistics.status_kawin"
                                    :key="status"
                                    class="flex justify-between items-center"
                                >
                                    <span class="text-sm text-gray-600">{{
                                        status || "Tidak Diisi"
                                    }}</span>
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-gray-900 mr-2"
                                            >{{ formatNumber(count) }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    count,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Kesehatan -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Statistik Kesehatan & Dokumen
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"
                                        >Memiliki JAMKESNAS</span
                                    >
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-green-600 mr-2"
                                            >{{
                                                formatNumber(
                                                    statistics.total_jamkesnas
                                                )
                                            }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    statistics.total_jamkesnas,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"
                                        >Memiliki KTP Elektronik</span
                                    >
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-blue-600 mr-2"
                                            >{{
                                                formatNumber(
                                                    statistics.total_ktp_el
                                                )
                                            }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    statistics.total_ktp_el,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"
                                        >Berkebutuhan Khusus</span
                                    >
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-red-600 mr-2"
                                            >{{
                                                formatNumber(
                                                    statistics.total_cacat
                                                )
                                            }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    statistics.total_cacat,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600"
                                        >Kepala Keluarga</span
                                    >
                                    <div class="flex items-center">
                                        <span
                                            class="text-lg font-semibold text-purple-600 mr-2"
                                            >{{
                                                formatNumber(
                                                    statistics.total_kepala_keluarga
                                                )
                                            }}</span
                                        >
                                        <span class="text-sm text-gray-500"
                                            >({{
                                                getPercentage(
                                                    statistics.total_kepala_keluarga,
                                                    statistics.total_penduduk
                                                )
                                            }}%)</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistik Kewarganegaraan -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">
                            Kewarganegaraan
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div
                                v-for="(
                                    count, warga
                                ) in statistics.warga_negara_stats"
                                :key="warga"
                                class="text-center"
                            >
                                <div
                                    class="text-4xl font-bold"
                                    :class="
                                        warga === 'WNI'
                                            ? 'text-green-600'
                                            : 'text-blue-600'
                                    "
                                >
                                    {{ formatNumber(count) }}
                                </div>
                                <div class="text-lg text-gray-600">
                                    {{
                                        warga === "WNI"
                                            ? "Warga Negara Indonesia"
                                            : "Warga Negara Asing"
                                    }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{
                                        getPercentage(
                                            count,
                                            statistics.total_penduduk
                                        )
                                    }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">
                            Aksi Cepat
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <Link
                                :href="route('penduduk.create')"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded text-center block"
                            >
                                Tambah Data Penduduk
                            </Link>
                            <Link
                                :href="route('penduduk.index')"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded text-center block"
                            >
                                Lihat Semua Data
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

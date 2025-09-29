<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    penduduk: Object,
    filters: Object,
});

// Search and filter state - initialize from props if available
const search = ref(props.filters?.search || "");
const filterJenisKelamin = ref(props.filters?.jenis_kelamin || "");

const deletePenduduk = (id) => {
    if (confirm("Apakah Anda yakin ingin menghapus data penduduk ini?")) {
        router.delete(route("penduduk.destroy", id));
    }
};

// Function to handle search and filter with debounce
let timeout;
const handleSearch = () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        router.get(
            route("penduduk.index"),
            {
                search: search.value,
                jenis_kelamin: filterJenisKelamin.value,
            },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300);
};

// Reset function
const resetFilters = () => {
    search.value = "";
    filterJenisKelamin.value = "";
    router.get(
        route("penduduk.index"),
        {},
        {
            preserveState: true,
            replace: true,
        }
    );
};

// Download Excel function
const downloadExcel = () => {
    const params = {
        search: search.value,
        jenis_kelamin: filterJenisKelamin.value,
    };

    // Build query string
    const queryString = new URLSearchParams(params).toString();
    const url =
        route("penduduk.export") + (queryString ? "?" + queryString : "");

    // Create a temporary link and click it to download
    window.open(url, "_blank");
};
</script>

<template>
    <Head title="Data Penduduk" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Data Penduduk
                </h2>
                <div class="flex space-x-3">
                    <button
                        @click="downloadExcel"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 rounded inline-flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                        </svg>
                        Download Excel
                    </button>
                    <Link :href="route('penduduk.create')">
                        <PrimaryButton class="bg-blue-600 hover:bg-blue-700">
                            Tambah Data Penduduk
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <!-- Success Message -->
                        <div
                            v-if="$page.props.flash.success"
                            class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
                        >
                            {{ $page.props.flash.success }}
                        </div>

                        <!-- Search and Filter Section -->
                        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                            <div
                                class="flex flex-col md:flex-row gap-4 items-end"
                            >
                                <div class="flex-1">
                                    <label
                                        for="search"
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Cari Data
                                    </label>
                                    <TextInput
                                        id="search"
                                        v-model="search"
                                        type="text"
                                        class="w-full"
                                        placeholder="Cari berdasarkan nama, NIK, atau No. KK..."
                                        @input="handleSearch"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="filter-jk"
                                        class="block text-sm font-medium text-gray-700 mb-2"
                                    >
                                        Jenis Kelamin
                                    </label>
                                    <select
                                        id="filter-jk"
                                        v-model="filterJenisKelamin"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        @change="handleSearch"
                                    >
                                        <option value="">Semua</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <button
                                        @click="resetFilters"
                                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">
                                    {{ penduduk.total }}
                                </div>
                                <div class="text-sm text-blue-800">
                                    Total Penduduk
                                </div>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">
                                    {{
                                        penduduk.data.filter(
                                            (item) =>
                                                item.jenis_kelamin?.name ===
                                                "Laki-Laki"
                                        ).length
                                    }}
                                </div>
                                <div class="text-sm text-green-800">
                                    Laki-laki
                                </div>
                            </div>
                            <div class="bg-pink-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-pink-600">
                                    {{
                                        penduduk.data.filter(
                                            (item) =>
                                                item.jenis_kelamin?.name ===
                                                "Perempuan"
                                        ).length
                                    }}
                                </div>
                                <div class="text-sm text-pink-800">
                                    Perempuan
                                </div>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-purple-600">
                                    {{ penduduk.current_page }}
                                </div>
                                <div class="text-sm text-purple-800">
                                    Halaman {{ penduduk.last_page }}
                                </div>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-600">
                                    <tr>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            No
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            NIK
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Nama Lengkap
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            No. KK
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            JK
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            TTL
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Agama
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Status Nikah
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Hub. KK
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Pekerjaan
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Alamat
                                        </th>
                                        <th
                                            class="px-3 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                        >
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="(item, index) in penduduk.data"
                                        :key="item.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            {{
                                                (penduduk.current_page - 1) *
                                                    penduduk.per_page +
                                                index +
                                                1
                                            }}
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900 font-mono"
                                        >
                                            {{ item.nik }}
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900 font-medium"
                                        >
                                            {{ item.nama_lengkap }}
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900 font-mono"
                                        >
                                            {{ item.no_kk }}
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                                :class="
                                                    item.jenis_kelamin?.name ===
                                                    'Laki-Laki'
                                                        ? 'bg-blue-100 text-blue-800'
                                                        : 'bg-pink-100 text-pink-800'
                                                "
                                            >
                                                {{
                                                    item.jenis_kelamin?.name ===
                                                    "Laki-Laki"
                                                        ? "L"
                                                        : "P"
                                                }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-900"
                                        >
                                            <div class="max-w-xs">
                                                <div class="font-medium">
                                                    {{ item.tempat_lahir }}
                                                </div>
                                                <div class="text-gray-500">
                                                    {{
                                                        new Date(
                                                            item.tanggal_lahir
                                                        ).toLocaleDateString(
                                                            "id-ID"
                                                        )
                                                    }}
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            {{ item.agama?.name || "-" }}
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            <span
                                                v-if="item.status_kawin?.name"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800"
                                            >
                                                {{ item.status_kawin.name }}
                                            </span>
                                            <span v-else class="text-gray-400"
                                                >-</span
                                            >
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm text-gray-900"
                                        >
                                            <span
                                                v-if="item.kk_level?.name"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800"
                                            >
                                                {{ item.kk_level?.name }}
                                            </span>
                                            <span v-else class="text-gray-400"
                                                >-</span
                                            >
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-900"
                                        >
                                            <div
                                                class="max-w-xs truncate"
                                                :title="item.pekerjaan?.name"
                                            >
                                                {{
                                                    item.pekerjaan?.name || "-"
                                                }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-900"
                                        >
                                            <div
                                                class="max-w-xs truncate"
                                                :title="item.alamat"
                                            >
                                                {{ item.alamat }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-3 py-4 whitespace-nowrap text-sm font-medium"
                                        >
                                            <div class="flex space-x-2">
                                                <Link
                                                    :href="
                                                        route(
                                                            'penduduk.show',
                                                            item.id
                                                        )
                                                    "
                                                    class="text-blue-600 hover:text-blue-900"
                                                    title="Lihat Detail"
                                                >
                                                    👁️
                                                </Link>
                                                <Link
                                                    :href="
                                                        route(
                                                            'penduduk.edit',
                                                            item.id
                                                        )
                                                    "
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                    title="Edit Data"
                                                >
                                                    ✏️
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Empty State -->
                        <div
                            v-if="penduduk.data.length === 0"
                            class="text-center py-12"
                        >
                            <div class="text-gray-500 text-lg">
                                Belum ada data penduduk
                            </div>
                            <div class="mt-4">
                                <Link :href="route('penduduk.create')">
                                    <PrimaryButton
                                        class="bg-blue-600 hover:bg-blue-700"
                                    >
                                        Tambah Data Pertama
                                    </PrimaryButton>
                                </Link>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div v-if="penduduk.last_page > 1" class="mt-6">
                            <nav class="flex items-center justify-between">
                                <div
                                    class="flex-1 flex justify-between sm:hidden"
                                >
                                    <Link
                                        v-if="penduduk.prev_page_url"
                                        :href="penduduk.prev_page_url"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                                    >
                                        Sebelumnya
                                    </Link>
                                    <Link
                                        v-if="penduduk.next_page_url"
                                        :href="penduduk.next_page_url"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                                    >
                                        Selanjutnya
                                    </Link>
                                </div>
                                <div
                                    class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
                                >
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Menampilkan
                                            <span class="font-medium">{{
                                                penduduk.from
                                            }}</span>
                                            sampai
                                            <span class="font-medium">{{
                                                penduduk.to
                                            }}</span>
                                            dari
                                            <span class="font-medium">{{
                                                penduduk.total
                                            }}</span>
                                            hasil
                                        </p>
                                    </div>
                                    <div>
                                        <nav
                                            class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        >
                                            <Link
                                                v-if="penduduk.prev_page_url"
                                                :href="penduduk.prev_page_url"
                                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                                            >
                                                <span class="sr-only"
                                                    >Sebelumnya</span
                                                >
                                                &#8249;
                                            </Link>
                                            <template
                                                v-for="page in penduduk.links"
                                                :key="page.label"
                                            >
                                                <Link
                                                    v-if="
                                                        page.url &&
                                                        !page.label.includes(
                                                            'Previous'
                                                        ) &&
                                                        !page.label.includes(
                                                            'Next'
                                                        )
                                                    "
                                                    :href="page.url"
                                                    class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                                                    :class="
                                                        page.active
                                                            ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                                                            : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                                                    "
                                                >
                                                    {{ page.label }}
                                                </Link>
                                            </template>
                                            <Link
                                                v-if="penduduk.next_page_url"
                                                :href="penduduk.next_page_url"
                                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                                            >
                                                <span class="sr-only"
                                                    >Selanjutnya</span
                                                >
                                                &#8250;
                                            </Link>
                                        </nav>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

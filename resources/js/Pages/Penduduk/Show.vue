<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    penduduk: Object,
});

const formatDate = (date) => {
    return date ? new Date(date).toLocaleDateString("id-ID") : "-";
};

const formatBoolean = (value) => {
    if (value === null || value === undefined) return "-";
    return value ? "Ya" : "Tidak";
};
</script>

<template>
    <Head title="Detail Data Penduduk" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Detail Data Penduduk
                </h2>
                <div class="flex space-x-3">
                    <Link :href="route('penduduk.edit', penduduk.id)">
                        <PrimaryButton
                            class="bg-indigo-600 hover:bg-indigo-700"
                        >
                            Edit Data
                        </PrimaryButton>
                    </Link>
                    <Link :href="route('penduduk.index')">
                        <PrimaryButton class="bg-gray-600 hover:bg-gray-700">
                            Kembali
                        </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <!-- Data Identitas -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Identitas
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >No. Kartu Keluarga</label
                                    >
                                    <p
                                        class="mt-1 text-sm text-gray-900 font-mono"
                                    >
                                        {{ penduduk.no_kk }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >NIK</label
                                    >
                                    <p
                                        class="mt-1 text-sm text-gray-900 font-mono"
                                    >
                                        {{ penduduk.nik }}
                                    </p>
                                </div>
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Nama Lengkap</label
                                    >
                                    <p
                                        class="mt-1 text-lg text-gray-900 font-semibold"
                                    >
                                        {{ penduduk.nama_lengkap }}
                                    </p>
                                </div>
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Alamat</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.alamat }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Jenis Kelamin</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                            :class="
                                                penduduk.jenis_kelamin?.name ===
                                                'Laki-Laki'
                                                    ? 'bg-blue-100 text-blue-800'
                                                    : 'bg-pink-100 text-pink-800'
                                            "
                                        >
                                            {{
                                                penduduk.jenis_kelamin?.name ||
                                                "Tidak Diketahui"
                                            }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Tempat, Tanggal Lahir</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.tempat_lahir }},
                                        {{ formatDate(penduduk.tanggal_lahir) }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Agama</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.agama?.name || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Kewarganegaraan</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                        >
                                            {{
                                                penduduk.warga_negara?.name ||
                                                "-"
                                            }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Orangtua -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Orangtua
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >NIK Ayah</label
                                    >
                                    <p
                                        class="mt-1 text-sm text-gray-900 font-mono"
                                    >
                                        {{ penduduk.nik_ayah || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Nama Ayah</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.nama_ayah || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >NIK Ibu</label
                                    >
                                    <p
                                        class="mt-1 text-sm text-gray-900 font-mono"
                                    >
                                        {{ penduduk.nik_ibu || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Nama Ibu</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.nama_ibu || "-" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pendidikan & Pekerjaan -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Pendidikan & Pekerjaan
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Pendidikan dalam KK</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{
                                            penduduk.pendidikan_kk?.name || "-"
                                        }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Pendidikan yang Sedang Ditempuh</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{
                                            penduduk.pendidikan_sedang?.name ||
                                            "-"
                                        }}
                                    </p>
                                </div>
                                <div class="md:col-span-2">
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Pekerjaan</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.pekerjaan?.name || "-" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Keluarga -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Keluarga
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Status Menikah</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            v-if="penduduk.status_kawin?.name"
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800"
                                        >
                                            {{ penduduk.status_kawin.name }}
                                        </span>
                                        <span v-else class="text-gray-400"
                                            >-</span
                                        >
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Hubungan dalam KK</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            v-if="penduduk.kk_level?.name"
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800"
                                        >
                                            {{ penduduk.kk_level.name }}
                                        </span>
                                        <span v-else class="text-gray-400"
                                            >-</span
                                        >
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Golongan Darah</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            v-if="penduduk.golongan_darah?.name"
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800"
                                        >
                                            {{ penduduk.golongan_darah.name }}
                                        </span>
                                        <span v-else class="text-gray-400"
                                            >-</span
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Dokumen -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Dokumen
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Akta Lahir</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.akta_lahir || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Dokumen Passport</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.dokumen_passport || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Tanggal Akhir Passport</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{
                                            formatDate(
                                                penduduk.tanggal_akhir_passport
                                            )
                                        }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Akta Perkawinan</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.akta_perkawinan || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Tanggal Perkawinan</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{
                                            formatDate(
                                                penduduk.tanggal_perkawinan
                                            )
                                        }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Akta Perceraian</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.akta_perceraian || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Tanggal Perceraian</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{
                                            formatDate(
                                                penduduk.tanggal_perceraian
                                            )
                                        }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Dokumen KITAS</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.dokumen_kitas || "-" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Kesehatan & Lainnya -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Kesehatan & Lainnya
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Jamkesnas</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                        >
                                            {{
                                                penduduk.jamkesnas?.name || "-"
                                            }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Cacat</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800"
                                        >
                                            {{ penduduk.cacat?.name || "-" }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Cara KB</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.cara_kb?.name || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Hamil</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800"
                                        >
                                            {{ penduduk.hamil?.name || "-" }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >KTP Elektronik</label
                                    >
                                    <p class="mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800"
                                        >
                                            {{ penduduk.ktp_el?.name || "-" }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Asuransi</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.asuransi?.name || "-" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Status -->
                        <div class="mb-8">
                            <h3
                                class="text-lg font-medium text-gray-900 mb-4 border-b border-gray-200 pb-2"
                            >
                                Data Status
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Status Rekam</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.status_rekam?.name || "-" }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Status Dasar</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ penduduk.status_dasar?.name || "-" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Metadata -->
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Informasi Sistem
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Dibuat pada</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ formatDate(penduduk.created_at) }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700"
                                        >Terakhir diubah</label
                                    >
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ formatDate(penduduk.updated_at) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

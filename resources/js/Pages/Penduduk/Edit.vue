<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    penduduk: Object,
    masterData: Object,
});

const getOptions = (masterArray) => {
    if (!masterArray || !Array.isArray(masterArray)) {
        return [];
    }
    return masterArray.map((item) => ({
        value: item.id,
        label: item.name,
    }));
};

const formatDateForInput = (dateValue) => {
    if (!dateValue) return "";

    // Jika dateValue adalah string, coba parse
    if (typeof dateValue === 'string') {
        // Jika sudah dalam format YYYY-MM-DD, gunakan langsung
        if (dateValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
            return dateValue;
        }
        // Jika ada waktu, ambil bagian tanggal saja
        if (dateValue.includes(' ')) {
            return dateValue.split(' ')[0];
        }
        // Coba parse dengan Date constructor
        const parsedDate = new Date(dateValue);
        if (!isNaN(parsedDate.getTime())) {
            return parsedDate.toISOString().split('T')[0];
        }
    }

    // Jika dateValue adalah object Date
    if (dateValue instanceof Date && !isNaN(dateValue.getTime())) {
        return dateValue.toISOString().split('T')[0];
    }

    return "";
};

const form = useForm({
    no_kk: props.penduduk.no_kk || "",
    nik: props.penduduk.nik || "",
    nama_lengkap: props.penduduk.nama_lengkap || "",
    alamat: props.penduduk.alamat || "",
    jenis_kelamin: (typeof props.penduduk.jenis_kelamin === 'object' && props.penduduk.jenis_kelamin?.id)
        ? props.penduduk.jenis_kelamin.id
        : props.penduduk.jenis_kelamin || "",
    tempat_lahir: props.penduduk.tempat_lahir || "",
    tanggal_lahir: formatDateForInput(props.penduduk.tanggal_lahir),
    agama: (typeof props.penduduk.agama === 'object' && props.penduduk.agama?.id)
        ? props.penduduk.agama.id
        : props.penduduk.agama || "",
    pendidikan_kk: (typeof props.penduduk.pendidikan_kk === 'object' && props.penduduk.pendidikan_kk?.id)
        ? props.penduduk.pendidikan_kk.id
        : props.penduduk.pendidikan_kk || "",
    pendidikan_sedang: (typeof props.penduduk.pendidikan_sedang === 'object' && props.penduduk.pendidikan_sedang?.id)
        ? props.penduduk.pendidikan_sedang.id
        : props.penduduk.pendidikan_sedang || "",
    pekerjaan: (typeof props.penduduk.pekerjaan === 'object' && props.penduduk.pekerjaan?.id)
        ? props.penduduk.pekerjaan.id
        : props.penduduk.pekerjaan || "",
    status_menikah: (typeof props.penduduk.status_menikah === 'object' && props.penduduk.status_menikah?.id)
        ? props.penduduk.status_menikah.id
        : props.penduduk.status_menikah || "",
    kk_level: (typeof props.penduduk.kk_level === 'object' && props.penduduk.kk_level?.id)
        ? props.penduduk.kk_level.id
        : props.penduduk.kk_level || "",
    warga_negara: (typeof props.penduduk.warga_negara === 'object' && props.penduduk.warga_negara?.id)
        ? props.penduduk.warga_negara.id
        : props.penduduk.warga_negara || "",
    nik_ayah: props.penduduk.nik_ayah || "",
    nama_ayah: props.penduduk.nama_ayah || "",
    nik_ibu: props.penduduk.nik_ibu || "",
    nama_ibu: props.penduduk.nama_ibu || "",
    golongan_darah: (typeof props.penduduk.golongan_darah === 'object' && props.penduduk.golongan_darah?.id)
        ? props.penduduk.golongan_darah.id
        : props.penduduk.golongan_darah || "",
    akta_lahir: props.penduduk.akta_lahir || "",
    dokumen_passport: props.penduduk.dokumen_passport || "",
    tanggal_akhir_passport: formatDateForInput(props.penduduk.tanggal_akhir_passport),
    akta_perkawinan: props.penduduk.akta_perkawinan || "",
    tanggal_perkawinan: formatDateForInput(props.penduduk.tanggal_perkawinan),
    akta_perceraian: props.penduduk.akta_perceraian || "",
    tanggal_perceraian: formatDateForInput(props.penduduk.tanggal_perceraian),
    dokumen_kitas: props.penduduk.dokumen_kitas || "",
    jamkesnas: (typeof props.penduduk.jamkesnas === 'object' && props.penduduk.jamkesnas?.id)
        ? props.penduduk.jamkesnas.id
        : props.penduduk.jamkesnas || "",
    cacat: (typeof props.penduduk.cacat === 'object' && props.penduduk.cacat?.id)
        ? props.penduduk.cacat.id
        : props.penduduk.cacat || "",
    cara_kb: (typeof props.penduduk.cara_kb === 'object' && props.penduduk.cara_kb?.id)
        ? props.penduduk.cara_kb.id
        : props.penduduk.cara_kb || "",
    hamil: (typeof props.penduduk.hamil === 'object' && props.penduduk.hamil?.id)
        ? props.penduduk.hamil.id
        : props.penduduk.hamil || "",
    ktp_el: (typeof props.penduduk.ktp_el === 'object' && props.penduduk.ktp_el?.id)
        ? props.penduduk.ktp_el.id
        : props.penduduk.ktp_el || "",
    status_rekam: (typeof props.penduduk.status_rekam === 'object' && props.penduduk.status_rekam?.id)
        ? props.penduduk.status_rekam.id
        : props.penduduk.status_rekam || "",
    status_dasar: (typeof props.penduduk.status_dasar === 'object' && props.penduduk.status_dasar?.id)
        ? props.penduduk.status_dasar.id
        : props.penduduk.status_dasar || "",
    asuransi: (typeof props.penduduk.asuransi === 'object' && props.penduduk.asuransi?.id)
        ? props.penduduk.asuransi.id
        : props.penduduk.asuransi || "",
});

const submit = () => {
    form.put(route("penduduk.update", props.penduduk.id), {
        onSuccess: () => {
            // Redirect akan ditangani oleh controller
        },
        onError: (errors) => {
            console.log("Validation errors:", errors);
        },
    });
};
</script>

<template>
    <Head title="Edit Data Penduduk" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit Data Penduduk
                </h2>
                <Link :href="route('penduduk.index')">
                    <SecondaryButton> Kembali ke Daftar </SecondaryButton>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Success Message -->
                        <div
                            v-if="$page.props.flash.success"
                            class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        >
                            <strong class="font-bold">✓ Berhasil!</strong>
                            <span class="block sm:inline ml-1">{{
                                $page.props.flash.success
                            }}</span>
                        </div>

                        <!-- Error Message Global -->
                        <div
                            v-if="$page.props.flash.error"
                            class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        >
                            <strong class="font-bold">✕ Error!</strong>
                            <span class="block sm:inline ml-1">{{
                                $page.props.flash.error
                            }}</span>
                        </div>

                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Data Identitas -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Identitas
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- No KK -->
                                    <div>
                                        <InputLabel
                                            for="no_kk"
                                            value="No. Kartu Keluarga"
                                        />
                                        <TextInput
                                            id="no_kk"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.no_kk"
                                            required
                                            autofocus
                                            placeholder="Masukkan No. KK"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.no_kk"
                                        />
                                    </div>

                                    <!-- NIK -->
                                    <div>
                                        <InputLabel for="nik" value="NIK" />
                                        <TextInput
                                            id="nik"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nik"
                                            required
                                            placeholder="Masukkan NIK"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nik"
                                        />
                                    </div>

                                    <!-- Nama Lengkap -->
                                    <div class="md:col-span-2">
                                        <InputLabel
                                            for="nama_lengkap"
                                            value="Nama Lengkap"
                                        />
                                        <TextInput
                                            id="nama_lengkap"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nama_lengkap"
                                            required
                                            placeholder="Masukkan nama lengkap"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nama_lengkap"
                                        />
                                    </div>

                                    <!-- Alamat -->
                                    <div class="md:col-span-2">
                                        <InputLabel
                                            for="alamat"
                                            value="Alamat"
                                        />
                                        <textarea
                                            id="alamat"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.alamat"
                                            rows="3"
                                            placeholder="Masukkan alamat lengkap"
                                        ></textarea>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.alamat"
                                        />
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div>
                                        <InputLabel
                                            for="jenis_kelamin"
                                            value="Jenis Kelamin"
                                        />
                                        <select
                                            id="jenis_kelamin"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.jenis_kelamin"
                                            required
                                        >
                                            <option value="">
                                                Pilih Jenis Kelamin
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.sex
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.jenis_kelamin"
                                        />
                                    </div>

                                    <!-- Tempat Lahir -->
                                    <div>
                                        <InputLabel
                                            for="tempat_lahir"
                                            value="Tempat Lahir"
                                        />
                                        <TextInput
                                            id="tempat_lahir"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.tempat_lahir"
                                            required
                                            placeholder="Masukkan tempat lahir"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.tempat_lahir"
                                        />
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div>
                                        <InputLabel
                                            for="tanggal_lahir"
                                            value="Tanggal Lahir"
                                        />
                                        <TextInput
                                            id="tanggal_lahir"
                                            type="date"
                                            class="mt-1 block w-full"
                                            v-model="form.tanggal_lahir"
                                            required
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.tanggal_lahir"
                                        />
                                    </div>

                                    <!-- Agama -->
                                    <div>
                                        <InputLabel for="agama" value="Agama" />
                                        <select
                                            id="agama"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.agama"
                                            required
                                        >
                                            <option value="">
                                                Pilih Agama
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.agama
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.agama"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Orangtua -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Orangtua
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- NIK Ayah -->
                                    <div>
                                        <InputLabel
                                            for="nik_ayah"
                                            value="NIK Ayah"
                                        />
                                        <TextInput
                                            id="nik_ayah"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nik_ayah"
                                            placeholder="Masukkan NIK Ayah"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nik_ayah"
                                        />
                                    </div>

                                    <!-- Nama Ayah -->
                                    <div>
                                        <InputLabel
                                            for="nama_ayah"
                                            value="Nama Ayah"
                                        />
                                        <TextInput
                                            id="nama_ayah"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nama_ayah"
                                            placeholder="Masukkan nama ayah"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nama_ayah"
                                        />
                                    </div>

                                    <!-- NIK Ibu -->
                                    <div>
                                        <InputLabel
                                            for="nik_ibu"
                                            value="NIK Ibu"
                                        />
                                        <TextInput
                                            id="nik_ibu"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nik_ibu"
                                            placeholder="Masukkan NIK Ibu"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nik_ibu"
                                        />
                                    </div>

                                    <!-- Nama Ibu -->
                                    <div>
                                        <InputLabel
                                            for="nama_ibu"
                                            value="Nama Ibu"
                                        />
                                        <TextInput
                                            id="nama_ibu"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nama_ibu"
                                            placeholder="Masukkan nama ibu"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.nama_ibu"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Dokumen -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Dokumen
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- Akta Lahir -->
                                    <div>
                                        <InputLabel
                                            for="akta_lahir"
                                            value="Akta Lahir"
                                        />
                                        <TextInput
                                            id="akta_lahir"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.akta_lahir"
                                            placeholder="Nomor akta lahir"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.akta_lahir"
                                        />
                                    </div>

                                    <!-- Dokumen Passport -->
                                    <div>
                                        <InputLabel
                                            for="dokumen_passport"
                                            value="Dokumen Passport"
                                        />
                                        <TextInput
                                            id="dokumen_passport"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.dokumen_passport"
                                            placeholder="Nomor passport"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.dokumen_passport
                                            "
                                        />
                                    </div>

                                    <!-- Tanggal Akhir Passport -->
                                    <div>
                                        <InputLabel
                                            for="tanggal_akhir_passport"
                                            value="Tanggal Akhir Passport"
                                        />
                                        <TextInput
                                            id="tanggal_akhir_passport"
                                            type="date"
                                            class="mt-1 block w-full"
                                            v-model="
                                                form.tanggal_akhir_passport
                                            "
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors
                                                    .tanggal_akhir_passport
                                            "
                                        />
                                    </div>

                                    <!-- Akta Perkawinan -->
                                    <div>
                                        <InputLabel
                                            for="akta_perkawinan"
                                            value="Akta Perkawinan"
                                        />
                                        <TextInput
                                            id="akta_perkawinan"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.akta_perkawinan"
                                            placeholder="Nomor akta perkawinan"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.akta_perkawinan
                                            "
                                        />
                                    </div>

                                    <!-- Tanggal Perkawinan -->
                                    <div>
                                        <InputLabel
                                            for="tanggal_perkawinan"
                                            value="Tanggal Perkawinan"
                                        />
                                        <TextInput
                                            id="tanggal_perkawinan"
                                            type="date"
                                            class="mt-1 block w-full"
                                            v-model="form.tanggal_perkawinan"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.tanggal_perkawinan
                                            "
                                        />
                                    </div>

                                    <!-- Akta Perceraian -->
                                    <div>
                                        <InputLabel
                                            for="akta_perceraian"
                                            value="Akta Perceraian"
                                        />
                                        <TextInput
                                            id="akta_perceraian"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.akta_perceraian"
                                            placeholder="Nomor akta perceraian"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.akta_perceraian
                                            "
                                        />
                                    </div>

                                    <!-- Tanggal Perceraian -->
                                    <div>
                                        <InputLabel
                                            for="tanggal_perceraian"
                                            value="Tanggal Perceraian"
                                        />
                                        <TextInput
                                            id="tanggal_perceraian"
                                            type="date"
                                            class="mt-1 block w-full"
                                            v-model="form.tanggal_perceraian"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.tanggal_perceraian
                                            "
                                        />
                                    </div>

                                    <!-- Dokumen KITAS -->
                                    <div>
                                        <InputLabel
                                            for="dokumen_kitas"
                                            value="Dokumen KITAS"
                                        />
                                        <TextInput
                                            id="dokumen_kitas"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.dokumen_kitas"
                                            placeholder="Nomor dokumen KITAS"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.dokumen_kitas"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pendidikan & Pekerjaan -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Pendidikan & Pekerjaan
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- Pendidikan KK -->
                                    <div>
                                        <InputLabel
                                            for="pendidikan_kk"
                                            value="Pendidikan dalam KK"
                                        />
                                        <select
                                            id="pendidikan_kk"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.pendidikan_kk"
                                        >
                                            <option value="">
                                                Pilih Pendidikan dalam KK
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.pendidikan_kk
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.pendidikan_kk"
                                        />
                                    </div>

                                    <!-- Pendidikan Sedang -->
                                    <div>
                                        <InputLabel
                                            for="pendidikan_sedang"
                                            value="Pendidikan yang Sedang Ditempuh"
                                        />
                                        <select
                                            id="pendidikan_sedang"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.pendidikan_sedang"
                                        >
                                            <option value="">
                                                Pilih Pendidikan Sedang Ditempuh
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.pendidikan_sedang
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.pendidikan_sedang
                                            "
                                        />
                                    </div>

                                    <!-- Pekerjaan -->
                                    <div class="md:col-span-2">
                                        <InputLabel
                                            for="pekerjaan"
                                            value="Pekerjaan"
                                        />
                                        <select
                                            id="pekerjaan"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.pekerjaan"
                                        >
                                            <option value="">
                                                Pilih Pekerjaan
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.pekerjaan
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.pekerjaan"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Keluarga -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Keluarga
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- Status Menikah -->
                                    <div>
                                        <InputLabel
                                            for="status_menikah"
                                            value="Status Menikah"
                                        />
                                        <select
                                            id="status_menikah"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.status_menikah"
                                        >
                                            <option value="">
                                                Pilih Status Menikah
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.status_kawin
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.status_menikah
                                            "
                                        />
                                    </div>

                                    <!-- Hubungan dalam KK -->
                                    <div>
                                        <InputLabel
                                            for="kk_level"
                                            value="Hubungan dalam KK"
                                        />
                                        <select
                                            id="kk_level"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.kk_level"
                                        >
                                            <option value="">
                                                Pilih Hubungan dalam KK
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.kk_level
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.kk_level"
                                        />
                                    </div>

                                    <!-- Warga Negara -->
                                    <div>
                                        <InputLabel
                                            for="warga_negara"
                                            value="Kewarganegaraan"
                                        />
                                        <select
                                            id="warga_negara"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.warga_negara"
                                        >
                                            <option value="">
                                                Pilih Kewarganegaraan
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.warga_negara
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.warga_negara"
                                        />
                                    </div>

                                    <!-- Golongan Darah -->
                                    <div>
                                        <InputLabel
                                            for="golongan_darah"
                                            value="Golongan Darah"
                                        />
                                        <select
                                            id="golongan_darah"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.golongan_darah"
                                        >
                                            <option value="">
                                                Pilih Golongan Darah
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.golongan_darah
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="
                                                form.errors.golongan_darah
                                            "
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Kesehatan & Lainnya -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Kesehatan & Lainnya
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-3 gap-6"
                                >
                                    <!-- Jamkesnas -->
                                    <div>
                                        <InputLabel
                                            for="jamkesnas"
                                            value="Jamkesnas"
                                        />
                                        <select
                                            id="jamkesnas"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.jamkesnas"
                                        >
                                            <option value="">
                                                Pilih Status Jamkesnas
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.jamkesnas
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.jamkesnas"
                                        />
                                    </div>

                                    <!-- Cacat -->
                                    <div>
                                        <InputLabel for="cacat" value="Cacat" />
                                        <select
                                            id="cacat"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.cacat"
                                        >
                                            <option value="">
                                                Pilih Status Cacat
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.cacat
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.cacat"
                                        />
                                    </div>

                                    <!-- Cara KB -->
                                    <div>
                                        <InputLabel
                                            for="cara_kb"
                                            value="Cara KB"
                                        />
                                        <select
                                            id="cara_kb"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.cara_kb"
                                        >
                                            <option value="">
                                                Pilih Cara KB
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.cara_kb
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.cara_kb"
                                        />
                                    </div>

                                    <!-- Hamil -->
                                    <div>
                                        <InputLabel for="hamil" value="Hamil" />
                                        <select
                                            id="hamil"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.hamil"
                                        >
                                            <option value="">
                                                Pilih Status Hamil
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.hamil
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.hamil"
                                        />
                                    </div>

                                    <!-- KTP Elektronik -->
                                    <div>
                                        <InputLabel
                                            for="ktp_el"
                                            value="KTP Elektronik"
                                        />
                                        <select
                                            id="ktp_el"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.ktp_el"
                                        >
                                            <option value="">
                                                Pilih Status KTP-el
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.ktp_el
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.ktp_el"
                                        />
                                    </div>

                                    <!-- Asuransi -->
                                    <div>
                                        <InputLabel
                                            for="asuransi"
                                            value="Asuransi"
                                        />
                                        <select
                                            id="asuransi"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.asuransi"
                                        >
                                            <option value="">
                                                Pilih Asuransi
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.asuransi
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.asuransi"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Data Status -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3
                                    class="text-lg font-medium text-gray-900 mb-4"
                                >
                                    Data Status
                                </h3>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-6"
                                >
                                    <!-- Status Rekam -->
                                    <div>
                                        <InputLabel
                                            for="status_rekam"
                                            value="Status Rekam"
                                        />
                                        <select
                                            id="status_rekam"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.status_rekam"
                                        >
                                            <option value="">
                                                Pilih Status Rekam
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.status_rekam
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.status_rekam"
                                        />
                                    </div>

                                    <!-- Status Dasar -->
                                    <div>
                                        <InputLabel
                                            for="status_dasar"
                                            value="Status Dasar"
                                        />
                                        <select
                                            id="status_dasar"
                                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            v-model="form.status_dasar"
                                        >
                                            <option value="">
                                                Pilih Status Dasar
                                            </option>
                                            <option
                                                v-for="option in getOptions(
                                                    masterData?.status_dasar
                                                )"
                                                :key="option.value"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </select>
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.status_dasar"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div
                                class="flex items-center justify-between space-x-4 pt-6"
                            >
                                <Link
                                    :href="
                                        route(
                                            'penduduk.show',
                                            props.penduduk.id
                                        )
                                    "
                                >
                                    <SecondaryButton>
                                        Lihat Detail
                                    </SecondaryButton>
                                </Link>

                                <div class="flex items-center space-x-4">
                                    <Link :href="route('penduduk.index')">
                                        <SecondaryButton>
                                            Batal
                                        </SecondaryButton>
                                    </Link>

                                    <PrimaryButton
                                        class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        {{
                                            form.processing
                                                ? "Menyimpan..."
                                                : "Update Data Penduduk"
                                        }}
                                    </PrimaryButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

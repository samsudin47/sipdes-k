<script setup>
defineProps({
    type: {
        type: String,
        default: "info",
        validator: (value) =>
            ["success", "error", "warning", "info"].includes(value),
    },
    message: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div
        :class="[
            'border px-4 py-3 rounded relative',
            {
                'bg-green-100 border-green-400 text-green-700':
                    type === 'success',
                'bg-red-100 border-red-400 text-red-700': type === 'error',
                'bg-yellow-100 border-yellow-400 text-yellow-700':
                    type === 'warning',
                'bg-blue-100 border-blue-400 text-blue-700': type === 'info',
            },
        ]"
        role="alert"
    >
        <strong class="font-bold">
            <span v-if="type === 'success'">✓</span>
            <span v-else-if="type === 'error'">✗</span>
            <span v-else-if="type === 'warning'">⚠</span>
            <span v-else>ℹ</span>
        </strong>
        <span class="block sm:inline ml-2">{{ message }}</span>
    </div>
</template>

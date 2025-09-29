<template>
    <div class="flex flex-col items-center justify-center">
        <!-- Logo Pemerintahan Indonesia -->
        <svg
            viewBox="0 0 100 100"
            class="w-16 h-16 mb-2"
            xmlns="http://www.w3.org/2000/svg"
        >
            <!-- Garuda Wings -->
            <path
                d="M20,40 Q30,30 50,35 Q70,30 80,40 Q75,50 50,45 Q25,50 20,40 Z"
                fill="#FFD700"
                stroke="#B8860B"
                stroke-width="1"
            />

            <!-- Garuda Body -->
            <ellipse
                cx="50"
                cy="50"
                rx="12"
                ry="18"
                fill="#8B4513"
                stroke="#654321"
                stroke-width="1"
            />

            <!-- Garuda Head -->
            <circle
                cx="50"
                cy="35"
                r="8"
                fill="#8B4513"
                stroke="#654321"
                stroke-width="1"
            />

            <!-- Eagle Beak -->
            <path d="M45,35 L40,38 L45,40 Z" fill="#FFA500" />

            <!-- Eagle Eyes -->
            <circle cx="47" cy="32" r="2" fill="#000" />
            <circle cx="53" cy="32" r="2" fill="#000" />

            <!-- Shield -->
            <path
                d="M40,55 Q50,50 60,55 L60,75 Q50,80 40,75 Z"
                fill="#DC143C"
                stroke="#8B0000"
                stroke-width="1"
            />

            <!-- Pancasila Star -->
            <path
                d="M50,58 L52,62 L56,62 L53,65 L54,69 L50,67 L46,69 L47,65 L44,62 L48,62 Z"
                fill="#FFD700"
            />

            <!-- Rice and Cotton -->
            <g transform="translate(35,60)">
                <circle cx="0" cy="0" r="1.5" fill="#32CD32" />
                <circle cx="0" cy="-3" r="1.5" fill="#32CD32" />
                <circle cx="0" cy="-6" r="1.5" fill="#32CD32" />
            </g>
            <g transform="translate(65,60)">
                <circle cx="0" cy="0" r="1.5" fill="#FFFFFF" />
                <circle cx="0" cy="-3" r="1.5" fill="#FFFFFF" />
                <circle cx="0" cy="-6" r="1.5" fill="#FFFFFF" />
            </g>
        </svg>

        <!-- Text -->
        <div class="text-center">
            <h2 class="text-lg font-bold text-blue-800">PEMERINTAH DESA</h2>
            <h3 class="text-sm font-semibold text-blue-600">KABUPATEN BLORA</h3>
        </div>
    </div>
</template>
